<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class DailyReport extends Mailable
{
    protected $API = "https://api.gettruehelp.com/api/";

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->post($this->API.'get-survey', [
                            'api_key' => $apiKeys,
                        ]);
        
        $contents = $response->getBody();

        $data = json_decode($contents);
        
        if(isset($data->response)) {
            if($data->response->status != 200) {
                $orders = NULL;
            } else {
                $orders = $data->response->data;
            }
        } else {
            $orders = NULL;
        }
        $date = NULL; $survey_completed =0 ; $survey_postive =0 ; $survey_pending = 0;$safe =0 ; $visitor_safe =0 ; $visitor_unsafe = 0; $survey_unsafe = 0;
        foreach($orders as $order)
        {
            if(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::now()->subDays(1)->format('d/m/Y'))
            {
                $date = strftime("%d %b %Y",strtotime(Carbon::now()->subDays(1)));
                if($order->severity=="GREEN")
                {
                    if(isset($order->visitor_id))
                    {
                        $visitor_unsafe++;
                    }
                    $survey_completed++;
                    $safe++;
                }
                elseif($order->severity=="RED")
                {
                    if(isset($order->visitor_id))
                    {
                        $visitor_unsafe++;
                    }
                    $survey_completed++;
                    $survey_postive++;
                }
                elseif($order->severity=="YELLOW")
                {
                    if(isset($order->visitor_id))
                    {
                        $visitor_unsafe++;
                    }
                    $survey_completed++;
                    $survey_unsafe++;
                }
                else
                {
                }
            }
        }
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer ".$api_token
        ])->post('https://api.gettruehelp.com/api/employer-dashboard', [
            'api_key' => $apiKeys,
        ]);

        $contents = $response->getBody();

        $data = json_decode($contents);

        if(isset($data->response)) 
        {
            if($data->response->status == 200) 
            {
                $registered_employees = $data->response->data->registered_employees;
            }
             else 
            {
                $registered_employees = '0';
            }
        } 
        else 
        {
            $registered_employees = '0';
        }
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".$api_token
        ])->get($this->API.'account-info');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $account = $data->response->data->employer;
            // dd($account);
        $address = 'bishalranabr7@gmail.com';
        $subject = 'Truehelp | Daily Survey Report';
        $name = 'TrueHelp Health Check';
        return $this->view('emails.dailyReport')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo('noreply@gettruehelp.com', $name)
                    ->subject($subject)
                    ->with([
            'registered_employees' => $registered_employees,
            'survey_completed' => $survey_completed,
            'survey_postive' => $survey_postive,
            'survey_pending' => $survey_pending,
            'survey_unsafe' => $survey_unsafe,
            'safe' => $safe,
            'account' => $account,
            'visitor_unsafe' => $visitor_unsafe,
            'date' => $date
            ]);
    }
}
