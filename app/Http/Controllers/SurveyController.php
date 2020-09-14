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

        $name = session()->get('first_name');
        if(empty($name)){
            return redirect()->route('login');
        }
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            // 'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->get('https://api.gettruehelp.com/api/get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $employees = $data->response->data;

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
