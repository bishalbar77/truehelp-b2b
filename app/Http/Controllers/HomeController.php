<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $name = session()->get('first_name');
        
        if(empty($name)){
            return redirect()->route('login');
        }

        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');

        $response = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->post('https://api.gettruehelp.com/api/employer-dashboard', [
                            'api_key' => $apiKeys,
                        ]);

        $contents = $response->getBody();

        $data = json_decode($contents);

        if(isset($data->response)) {
            if($data->response->status == 200) {
                $registered_employees = $data->response->data->registered_employees;
                $verified_employees = $data->response->data->verified_employees;
                $pending_verifications = $data->response->data->pending_verifications;
                $red_cases = $data->response->data->red_cases; 
            } else {
                $registered_employees = '0';
                $verified_employees = '0';
                $pending_verifications = '0';
                $red_cases = '0';
            }
        } else {
            $registered_employees = '0';
            $verified_employees = '0';
            $pending_verifications = '0';
            $red_cases = '0';
        }

        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            // 'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->get('https://api.gettruehelp.com/api/get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);

        if(isset($data->response)){
            if($data->response->status != 200){
                $employees = NULL;
            } else {
                $employees = $data->response->data;
            }
        } else {
            $employees = NULL;
        }
        

        return view('home')->with([
            'registered_employees' => $registered_employees,
            'verified_employees' => $verified_employees,
            'pending_verifications' => $pending_verifications,
            'red_cases' => $red_cases,
            'employees' => $employees,
        ]);
    }

    public function change_password(Request $request){
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->post('https://api.gettruehelp.com/api/change-password', [
                            'old_password' => $request->old_password,
                            'new_password' => $request->new_password,
                            'confirm_password' => $request->confirm_password
                        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $message = $data->response->message;
        Session::flash('message', $message);
        return redirect('/profile') ;
    }
}
