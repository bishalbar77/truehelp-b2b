<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Spatie\Searchable\Search;
use \Cache;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->post('https://api.gettruehelp.com/api/notification',[
                            'api_key' => $apiKeys
                        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $nf_message = $data->response->data->messages;

        return view('home')->with([
            'registered_employees' => $registered_employees,
            'verified_employees' => $verified_employees,
            'pending_verifications' => $pending_verifications,
            'red_cases' => $red_cases,
            'employees' => $employees,
            'nf_message' => $nf_message,
        ]);
    }

    public function change_password(Request $request)
    {
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

    public function search(Request $request)
    {
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            // 'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->get('https://api.gettruehelp.com/api/get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);

        $searchResults = (new Search())
            ->registerModel($data, 'name')
            ->perform($request->input('query'));

        return view('pages.search', compact('searchResults'));
    }
}
