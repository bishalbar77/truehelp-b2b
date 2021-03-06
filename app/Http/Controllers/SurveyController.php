<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class SurveyController extends Controller
{
    protected $API = "https://api.gettruehelp.com/api/";

    public function getsurvey()
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

        $name = session()->get('first_name');
        if(empty($name)){
            return redirect()->route('login');
        }
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            // 'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->get($this->API.'get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $employees = $data->response->data;

        return view('health.index')->with([
            'orders' => $orders,
            'employees' => $employees
        ]);
    }

    public function ajax()
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
        return view('health.ajax')->with([
            'orders' => $orders
        ]);
    }
    

    public function health_details($id)
    { 
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->post($this->API.'get-survey-data/'.$id, [
                            'api_key' => $apiKeys,
                        ]);
        
        $contents = $response->getBody();

        $data = json_decode($contents);

        $surveys = $data->response->data->survey ?? NULL;
        $employee_id = $data->response->data->survey->employee_id ?? NULL;
        $answers = $data->response->data->survey_answers ?? NULL;
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

        $response = Http::withHeaders([
            'Authorization' => "Bearer ".$api_token
        ])->get($this->API.'account-info');

        $contents = $response->getBody();
        $data = json_decode($contents);
        $account = $data->response->data->employer;
        if($account == "Trying to get property 'id' of non-object")
        {
            $account=NULL;
        }

        return view('health.showprofile')->with([
            'surveys' => $surveys,
            'answers' => $answers,
            'account' => $account,
            'orders' => $orders,
            'employee_id' => $employee_id,
        ]);

    }

    public function visitor_health_details($id)
    { 
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->post($this->API.'get-survey-data/'.$id, [
                            'api_key' => $apiKeys,
                        ]);
        
        $contents = $response->getBody();

        $data = json_decode($contents);

        $surveys = $data->response->data->survey ?? NULL;
        $employee_id = $data->response->data->survey->employee_id ?? NULL;
        $answers = $data->response->data->survey_answers ?? NULL;
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
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer ".$api_token
        ])->get($this->API.'get-visitors');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $visitors = $data->response->data;

        foreach($visitors as $visitor)
        {
            if($visitor->id==$surveys->visitor_id)
            {
                $visitor_details = $visitor;
            }
        }

        
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".$api_token
        ])->get($this->API.'account-info');

        $contents = $response->getBody();
        $data = json_decode($contents);
        $account = $data->response->data->employer;
        if($account == "Trying to get property 'id' of non-object")
        {
            $account=NULL;
        }
        return view('health.showvisitor')->with([
            'surveys' => $surveys,
            'answers' => $answers,
            'orders' => $orders,
            'account' => $account,
            'employee_id' => $employee_id,
            'visitor_details' => $visitor_details
        ]);

    }

    public function survey_details($id)
    {   
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->post($this->API.'get-survey-data/'.$id, [
                            'api_key' => $apiKeys,
                        ]);
        
        $contents = $response->getBody();

        $data = json_decode($contents);

        $surveys = $data->response->data->survey ?? NULL;

        $answers = $data->response->data->survey_answers ?? NULL;
        return view('health.show')->with([
            'surveys' => $surveys,
            'answers' => $answers,
        ]);

    }

    public function store(Request $request)
    {
        $response = Http::post($this->API.'create-survey', [
            'employee_id' => $request->employee_id
        ]);
        
        return redirect('surveys/')->with('success', 'Survey Created Successfully!');
    }

    public function generate(Request $request)
    {
        $response = Http::post($this->API.'generate-message', [
            'employee_id' => $request->employee_id
        ]);
        
        return redirect('surveys/')->with('success', 'Survey Created Successfully!');
    }

    public function dashboard()
    {   
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->post($this->API.'healthcheck-dashboard', [
                            'api_key' => $apiKeys,
                        ]);

        $contents = $response->getBody();

        $data = json_decode($contents);
        if(isset($data->response))
        {
            $data = $data->response->data;
            $covid_up=($data->covid_increase>=0)?'up':'down';
            $fever_up=($data->fever_increase>=0)?'up':'down';
            return view('health.dashboard')->with(['data'=>$data, 'covid_up'=>$covid_up, 'fever_up' => $fever_up]);
        }

    }

    public function dashboard2()
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
                else if($order->severity=="GREEN")
                {
                    $a++;
                    $s++;
                }
                else
                {
                    $a++;
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
                else if($order->severity=="GREEN")
                {
                    $e++;
                    $t++;
                }
                else
                {
                    $e++;
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
                else if($order->severity=="GREEN")
                {
                    $g++;
                    $u++;
                }
                else
                {
                    $g++;
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
                else if($order->severity=="GREEN")
                {
                    $i++;
                    $v++;
                }
                else
                {
                    $i++;
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
                else if($order->severity=="GREEN")
                {
                    $k++;
                    $w++;
                }
                else
                {
                    $k++;
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
                else if($order->severity=="GREEN")
                {
                    $m++;
                    $x++;
                }
                else
                {
                    $m++;
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
                else if($order->severity=="GREEN")
                {
                    $o++;
                    $y++;
                }
                else
                {
                    $o++;
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
                else if($order->severity=="GREEN")
                {
                    $q++;
                    $z++;
                }
                else
                {
                    $q++;
                }
                if(isset($order->visitor_id))
                {
                    $v8++;
                }
            }
            else
            {}

        }
        $day[0]=Carbon::today()->format('d M');
        $total[0]=$a??0;
        $positive[0]=$b??0;
        $negative[0]=$s??0;
        $visitor_bar[0]=$v1??0;
        $day[1]=Carbon::now()->subDays(1)->format('d M');
        $total[1]=$e??0;
        $positive[1]=$f??0;
        $negative[1]=$t??0;
        $visitor_bar[1]=$v2??0;
        $day[2]=Carbon::now()->subDays(2)->format('d M');
        $total[2]=$g??0;
        $positive[2]=$h??0;
        $negative[2]=$u??0;
        $visitor_bar[2]=$v3??0;
        $day[3]=Carbon::now()->subDays(3)->format('d M');
        $total[3]=$i??0;
        $positive[3]=$j??0;
        $negative[3]=$v??0;
        $visitor_bar[3]=$v4??0;
        $day[4]=Carbon::now()->subDays(4)->format('d M');
        $total[4]=$k??0;
        $positive[4]=$l??0;
        $negative[4]=$w??0;
        $visitor_bar[4]=$v5??0;
        $day[5]=Carbon::now()->subDays(5)->format('d M');
        $total[5]=$m??0;
        $positive[5]=$n??0;
        $negative[5]=$x??0;
        $visitor_bar[5]=$v6??0;
        $day[6]=Carbon::now()->subDays(6)->format('d M');
        $total[6]=$o??0;
        $positive[6]=$p??0;
        $negative[6]=$y??0;
        $visitor_bar[6]=$v7??0;
        $day[7]=Carbon::now()->subDays(7)->format('d M');
        $total[7]=$q??0;
        $positive[7]=$r??0;
        $negative[7]=$z??0;
        $visitor_bar[7]=$v8??0;
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
            if(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::today()->format('d/m/Y'))
            {
                if($order->severity=="GREEN")
                {
                    if(isset($order->visitor_id))
                    {
                        $visitor_safe++;
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
        return view('health.dashboard_v2')->with([
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
        ]);

    }
    public function email()
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
        
        return view('emails.weeklyReport')->with([
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

    public function dashboardv3($id)
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
        $survey_completed =0 ; $survey_postive =0 ; $survey_pending = 0;
        $total[]=0; $positive[]=0; $negative[]=0; $day[]=0; $a=0; $b=0; $e=0; $f=0; $g=0; $h=0; 
        $i=0; $j=0; $k=0; $l=0; $m=0; $n=0; $o=0; $p=0; $q=0; $r=0; $safe=0; 
        $s=0; $t=0; $u=0; $v=0; $w=0; $x=0; $y=0; $z=0; $registered_candidates=0;

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
            }
            else
            {}
                $day[0]=Carbon::today()->format('d M');
                $total[0]=$a;
                $positive[0]=$b;
                $negative[0]=$s;
                $day[1]=Carbon::now()->subDays(1)->format('d M');
                $total[1]=$e;
                $positive[1]=$f;
                $negative[1]=$t;
                $day[2]=Carbon::now()->subDays(2)->format('d M');
                $total[2]=$g;
                $positive[2]=$h;
                $negative[2]=$u;
                $day[3]=Carbon::now()->subDays(3)->format('d M');
                $total[3]=$i;
                $positive[3]=$j;
                $negative[3]=$v;
                $day[4]=Carbon::now()->subDays(4)->format('d M');
                $total[4]=$k;
                $positive[4]=$l;
                $negative[4]=$w;
                $day[5]=Carbon::now()->subDays(5)->format('d M');
                $total[5]=$m;
                $positive[5]=$n;
                $negative[5]=$x;
                $day[6]=Carbon::now()->subDays(6)->format('d M');
                $total[6]=$o;
                $positive[6]=$p;
                $negative[6]=$y;
                $day[7]=Carbon::now()->subDays(7)->format('d M');
                $total[7]=$q;
                $positive[7]=$r;
                $negative[7]=$z;
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
            if(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') > Carbon::now()->subDays($id-1)->format('d/m/Y'))
            {
                if($order->severity=="GREEN")
                {
                    $survey_completed++;
                    $safe++;
                    $registered_candidates++;
                }
                elseif($order->severity=="RED")
                {
                    $survey_completed++;
                    $survey_postive++;
                    $registered_candidates++;
                }
                else
                {
                    $survey_pending++;
                    $registered_candidates++;
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
        return view('health.dashboard_v2')->with([
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
            'registered_candidates' => $registered_candidates,
            'image' => $image,
        ]);

    }

    public function dashboardv4($id)
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
        $survey_completed =0 ; $survey_postive =0 ; $survey_pending = 0;
        $total[]=0; $positive[]=0; $negative[]=0; $day[]=0; $a=0; $b=0; $e=0; $f=0; $g=0; $h=0; 
        $i=0; $j=0; $k=0; $l=0; $m=0; $n=0; $o=0; $p=0; $q=0; $r=0; $safe=0; 
        $s=0; $t=0; $u=0; $v=0; $w=0; $x=0; $y=0; $z=0; $registered_candidates=0; $check;

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
            }
            else
            {}
                $day[0]=Carbon::today()->format('d M');
                $total[0]=$a;
                $positive[0]=$b;
                $negative[0]=$s;
                $day[1]=Carbon::now()->subDays(1)->format('d M');
                $total[1]=$e;
                $positive[1]=$f;
                $negative[1]=$t;
                $day[2]=Carbon::now()->subDays(2)->format('d M');
                $total[2]=$g;
                $positive[2]=$h;
                $negative[2]=$u;
                $day[3]=Carbon::now()->subDays(3)->format('d M');
                $total[3]=$i;
                $positive[3]=$j;
                $negative[3]=$v;
                $day[4]=Carbon::now()->subDays(4)->format('d M');
                $total[4]=$k;
                $positive[4]=$l;
                $negative[4]=$w;
                $day[5]=Carbon::now()->subDays(5)->format('d M');
                $total[5]=$m;
                $positive[5]=$n;
                $negative[5]=$x;
                $day[6]=Carbon::now()->subDays(6)->format('d M');
                $total[6]=$o;
                $positive[6]=$p;
                $negative[6]=$y;
                $day[7]=Carbon::now()->subDays(7)->format('d M');
                $total[7]=$q;
                $positive[7]=$r;
                $negative[7]=$z;
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
            if(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') == Carbon::today()->format('d/m/Y'))
            {
                if($order->severity=="GREEN")
                {
                    $survey_completed++;
                    $safe++;
                    $registered_candidates++;
                }
                elseif($order->severity=="RED")
                {
                    $survey_completed++;
                    $survey_postive++;
                    $registered_candidates++;
                }
                else
                {
                    $survey_pending++;
                    $registered_candidates++;
                }
            }
        }
        if($id=='completed')
        {
            $check= 'COMPLETE';
        }
        elseif($id=='unsafe')
        {
            $check= 'RED';
        }
        elseif($id=='positive')
        {
            $check= 'RED';
        }
        elseif($id=='safe')
        {
            $check= 'GREEN';
        }
        else
        {
            $check= 'RED';
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

        return view('health.dashboard_v2')->with([
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
            'registered_candidates' => $registered_candidates,
            'image' => $image,
            'check' => $check
        ]);

    }

    public function visitors(Request $request)
    {
        $api_token = session()->get('api_token');
        $employer_id = session()->get('employer_id');
        // dd($employer_id);
        $country_code = $request->country_code;
        $mobile = $request->mobile;
        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $response = Http::withHeaders(['Authorization' => "Bearer ".$api_token])
            ->post($this->API.'store-visitors', [
            'country_code' => $country_code,
            'mobile' => $mobile,
            'first_name' =>$first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'employer_id' => $employer_id,
        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $message = $data->response->message;
        // dd($data);
        Session::flash('message', $message);
        return redirect('/health') ;
    }

    public function api()
    {
        $api_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTZiNWRkYzExODI0ZmYxY2ZhYTY4MDFkZTE0MDA4NGZiMDRiZGM5NjAwMzY5YWUyMDdiNmNjYzk4MmU4ODdiZGJmYTJhZjQwZGRlZTA2YmEiLCJpYXQiOjE1OTk3MjI3MDYsIm5iZiI6MTU5OTcyMjcwNiwiZXhwIjoxNjMxMjU4NzA2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.tzRW8mXQ_XrfzcPEig8jpChf99ywjeHcKpz_P5k7fK4TfgrvRYbx8eLzGgnnsjODZHDTxeqUZSGkSNlzK7CgAyjdRYtBpt6-XtH9vbwIK2Ks50vSVrk2xwSnlAUmf7fd_YhOdqfkzCuxPArqOBm8ls4Npw6bbqbkSE0AOHXYCUEkur4saTPKfeZphAqQ63cdwh-Y0luYnT7PpFgJjjpLfoUM51hOGL1oR4UzPkIT0CtXbtSnonuZbCkN1ZjeUWKB3f14vJxmoqB7B7UGuVI4NdO4WyuGv6E8o_tRse6aKUR6q4O0dXCwIQHCVlP7qzs4_zsezlcE5gi5k9yBsoOEUKdPOZbyUU5xVxmz0dh4V2AbkcdTt9_xZDYDfny5uTdQP154lLwDFlvF7XGTJVIkSFBbZMGgh1SYKKGuQGOsecZ2LNolDKGvxRF3PmXlbXDEjiY91NFmud1X8iIhXYy58n4C-31Lh9l_mkYSZIpL5VG1cdIIzaMeIk8RV6p-IL2IZz87SBEHVNbH5K-lC1Uc_kOUoXHoOimi-Rqa46AncJLS06YQ1rr1lJwqwgcfQhttTkzKmUrX5M22ibuMilQyPSe2erTOtyWEG9YqdmXWa6MHSffA4gOGLU_be8Ed2AS_kHDXDWnm0oW9-ZgO1Kw21Us3oGJueVV2dm20D9Ihmus";
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $response = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->post('https://api.gettruehelp.com/api/get-survey', [
                            'api_key' => $apiKeys,
                        ]);
        
        $contents = $response->getBody();
        $data = json_decode($contents);
        $orders = $data->response;
        return json_encode($orders);
    }
}
