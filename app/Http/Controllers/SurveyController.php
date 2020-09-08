<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class SurveyController extends Controller
{
    public function getsurvey()
    {
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        // dd($api_token);
        $response = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->post('https://api.gettruehelp.com/api/get-survey', [
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

        // dd($orders);

        $name = session()->get('first_name');
        if(empty($name)){
            return redirect()->route('login');
        }
        $api_token = session()->get('api_token');
        // $response = Http::withToken('api_token')->post('https://api.gettruehelp.com/api/get-candidates');
        $response = Http::withHeaders([
                            // 'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->get('https://api.gettruehelp.com/api/get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $employees = $data->response->data;

        // dd($employees);

        return view('health.index')->with([
            'orders' => $orders,
            'employees' => $employees
        ]);
    }

    public function survey_details($id)
    {
        // dd($id);
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->post('https://api.gettruehelp.com/api/get-survey-data/'.$id, [
                            'api_key' => $apiKeys,
                        ]);
        
        $contents = $response->getBody();

        $data = json_decode($contents);

        // dd($data);

        $surveys = $data->response->data->survey ?? '';

        $answers = $data->response->data->survey_answers ?? '';
        // dd( $data->response->data->survey_answers);
        // dd($answers);        

        return view('health.show')->with([
            'surveys' => $surveys,
            'answers' => $answers,
        ]);

    }

    public function store(Request $request)
    {
        // dd($request);
        $response = Http::post('https://api.gettruehelp.com/api/create-survey', [
            'employee_id' => $request->employee_id
        ]);
        
        // dd($response);
        return redirect('surveys/reports')->with('success', 'Survey Created Successfully!');
    }

    public function dashboard()
    {
        return view('health.dashboard');
    }
}
