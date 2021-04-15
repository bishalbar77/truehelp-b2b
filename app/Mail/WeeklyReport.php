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

class WeeklyReport extends Mailable
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

    // public function build()
    // {
    //     $address = 'bishalranabr7@gmail.com';
    //     $subject = 'This is a test!';
    //     $name = 'Bishal Rana';
        
    //     return $this->view('emails.test')
    //                 ->from($address, $name)
    //                 ->cc($address, $name)
    //                 ->bcc($address, $name)
    //                 ->replyTo($address, $name)
    //                 ->subject($subject)
    //                 ->with([ 'message' => $this->data['message'] ]);
    // }

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
        $survey_completed =0 ; $survey_postive =0; $survey_unsafe =0; $survey_pending = 0;
        $total[]=0; $positive[]=0; $negative[]=0; $day[]=0; $a=0; $b=0; $e=0; $f=0; $g=0; $h=0; 
        $i=0; $j=0; $k=0; $l=0; $m=0; $n=0; $o=0; $p=0; $q=0; $r=0; $safe=0; 
        $s=0; $t=0; $u=0; $v=0; $w=0; $x=0; $y=0; $z=0;
        $v1=0; $v2=0; $v3=0; $v4=0; $v5=0; $v6=0; $v7=0; $v8=0; 
        $visitor_bar[]=0; $visitor_safe=0; $visitor_unsafe=0;

        foreach($orders as $order)
        {
            if(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::today()->format('d/m/Y'))
            {
                if($order->severity=="RED")
                {
                    $a++;
                    $b++;
                }
                else
                {
                    $a++;
                    $s++;
                }
                if(isset($order->visitor_id))
                {
                    $v1++;
                }
            }
            elseif(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::now()->subDays(1)->format('d/m/Y'))
            {
                if($order->severity=="RED")
                {
                    $e++;
                    $f++;
                }
                else
                {
                    $e++;
                    $t++;
                }
                if(isset($order->visitor_id))
                {
                    $v2++;
                }
            }
            elseif(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::now()->subDays(2)->format('d/m/Y'))
            {
                if($order->severity=="RED")
                {
                    $g++;
                    $h++;
                }
                else
                {
                    $g++;
                    $u++;
                }
                if(isset($order->visitor_id))
                {
                    $v3++;
                }
            }
            elseif(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::now()->subDays(3)->format('d/m/Y'))
            {
                if($order->severity=="RED")
                {
                    $i++;
                    $j++;
                }
                else
                {
                    $i++;
                    $v++;
                }
                if(isset($order->visitor_id))
                {
                    $v4++;
                }
            }
            elseif(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::now()->subDays(4)->format('d/m/Y'))
            {
                if($order->severity=="RED")
                {
                    $k++;
                    $l++;
                }
                else
                {
                    $k++;
                    $w++;
                }
                if(isset($order->visitor_id))
                {
                    $v5++;
                }
            }
            elseif(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::now()->subDays(5)->format('d/m/Y'))
            {
                if($order->severity=="RED")
                {
                    $m++;
                    $n++;
                }
                else
                {
                    $m++;
                    $x++;
                }
                if(isset($order->visitor_id))
                {
                    $v6++;
                }
            }
            elseif(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::now()->subDays(6)->format('d/m/Y'))
            {
                if($order->severity=="RED")
                {
                    $o++;
                    $p++;
                }
                else
                {
                    $o++;
                    $y++;
                }
                if(isset($order->visitor_id))
                {
                    $v7++;
                }
            }
            elseif(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::now()->subDays(7)->format('d/m/Y'))
            {
                if($order->severity=="RED")
                {
                    $q++;
                    $r++;
                }
                else
                {
                    $q++;
                    $z++;
                }
                if(isset($order->visitor_id))
                {
                    $v8++;
                }
            }
            else
            {}
                $day[0]=Carbon::today()->format('d M');
                $total[0]=$a;
                $positive[0]=$b;
                $negative[0]=$s;
                $visitor_bar[0]=$v1;
                $day[1]=Carbon::now()->subDays(1)->format('d M');
                $total[1]=$e;
                $positive[1]=$f;
                $negative[1]=$t;
                $visitor_bar[1]=$v2;
                $day[2]=Carbon::now()->subDays(2)->format('d M');
                $total[2]=$g;
                $positive[2]=$h;
                $negative[2]=$u;
                $visitor_bar[2]=$v3;
                $day[3]=Carbon::now()->subDays(3)->format('d M');
                $total[3]=$i;
                $positive[3]=$j;
                $negative[3]=$v;
                $visitor_bar[3]=$v4;
                $day[4]=Carbon::now()->subDays(4)->format('d M');
                $total[4]=$k;
                $positive[4]=$l;
                $negative[4]=$w;
                $visitor_bar[4]=$v5;
                $day[5]=Carbon::now()->subDays(5)->format('d M');
                $total[5]=$m;
                $positive[5]=$n;
                $negative[5]=$x;
                $visitor_bar[5]=$v6;
                $day[6]=Carbon::now()->subDays(6)->format('d M');
                $total[6]=$o;
                $positive[6]=$p;
                $negative[6]=$y;
                $visitor_bar[6]=$v7;
                $day[7]=Carbon::now()->subDays(7)->format('d M');
                $total[7]=$q;
                $positive[7]=$r;
                $negative[7]=$z;
                $visitor_bar[7]=$v8;
        }
        $image=0;
        if($total[0]!=0)
        {
            $text = $total[0]/2 > $positive[0] ? 'YAY! You are Safe Today' : 'You are at high risk';
            $font = $total[0]/2 > $positive[0] ? '#00a13d' : 'rgb(255, 16, 96)';
            $image =$total[0]/2 > $positive[0] ? 'safe' : 'danger';
        }
        else
        {
            $text = 'SORRY! No surveys Today';
            $font = '#a9a9a9' ;
            $image = 'safe';
        }
        foreach($orders as $order)
        {
            if(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') > Carbon::now()->subDays(6)->format('d/m/Y'))
            {
                if($order->severity=="GREEN")
                {
                    $survey_completed++;
                    $safe++;
                }
                elseif($order->severity=="RED")
                {
                    $survey_completed++;
                    $survey_postive++;
                }
                else
                {
                    $survey_pending++;
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
        $subject = 'Truehelp | Weekly Survey Report';
        $name = 'Truehelp';

        return $this->view('emails.weeklyReport')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo('noreply@gettruehelp.com', $name)
                    ->subject($subject)
                    ->with([
            'orders'=> $orders,
            'registered_employees' => $registered_employees,
            'survey_completed' => $survey_completed,
            'survey_postive' => $survey_postive,
            'survey_pending' => $survey_pending,
            'day' => $day,
            'total' => $total,
            'positive' => $positive,
            'negative' => $negative,
            'text' => $text,
            'font' => $font,
            'safe' => $safe,
            'image' => $image,
            'survey_unsafe' => $survey_unsafe,
            'visitor_bar' => $visitor_bar,
            'visitor_safe' => $visitor_safe,
            'visitor_unsafe' => $visitor_unsafe,
            'account' => $account,
        ]);
    }
}
