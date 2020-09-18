<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Imports\EmployeesImport;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class EmployeeController extends Controller
{   

    protected $API = "http://127.0.0.1:8001/api/";
    // protected $API = "https://api.gettruehelp.com/api/";

    public function index()
    {
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            // 'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->get($this->API.'get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);

        if(isset($data->response)) {
            if($data->response->status != 200){
                $employees = NULL;
            } else {
                $employees = $data->response->data;
            }
        } else {
            $employees = NULL;
        }

        if(is_array($employees))
            // dd("ddddddd");
        $employees = array_reverse($employees);    

        $device_id = "00000000-89ABCDEF-01234567-89ABCDEH";
        $source = "B2B";
        $response = Http::post($this->API.'employee-types', [
            'device_id' => $device_id,
            'source' => $source,
        ]);

        $contents = $response->getBody();

        $data = json_decode($contents);
        $emp_type = $data->response->data;
        return view('employees.index', compact('employees','emp_type'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $api_token = session()->get('api_token');
        $co_relation = $request->co_relation;
        $parent_email = $request->parent_email;
        $parent_mobile = $request->parent_mobile;
        $parent_first_name = $request->parent_first_name;
        $parent_middle_name = $request->parent_middle_name;
        $parent_last_name = $request->parent_last_name;
        $parent_dob = $request->parent_dob;
        $parent_gender = $request->parent_gender;
        $email = $request->email;
        $email = $request->country_code;
        $mobile = $request->mobile;
        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $student_code = $request->student_code;
        $dob = $request->dob;
        $gender = $request->gender;
        $source_name = "B2B";
        $employee_types_id = $request->emp_type;
        $response = Http::withHeaders(['Authorization' => "Bearer ".$api_token])
            ->post($this->API.'register-students', [
            'co_relation' => $co_relation,
            'parent_email' => $parent_email,
            'parent_mobile' => $parent_mobile,
            'parent_first_name' => $parent_first_name,
            'parent_middle_name' => $parent_middle_name,
            'parent_last_name' => $parent_last_name,
            'parent_dob' => $parent_dob,
            'parent_gender' => $parent_gender,
            'email' => $email,
            'country_code' => $country_code,
            'mobile' => $mobile,
            'first_name' =>$first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'student_code' => $student_code,
            'dob' => $dob,
            'gender' => $gender,
            'source_name' =>$source_name,
            'employee_types_id' => $employee_types_id
        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $message = $data->response->message;
        // dd($data);
        Session::flash('message', $message);
        return redirect('/employees') ;
        // return redirect()->route('employees.index');
    }

    public function import(Request $request)
    {  
        $this->validate($request, [
        'select_file'  => 'required|mimes:xls,xlsx'
        ]);
        $import = new EmployeesImport;
        $import->import(request()->file('select_file'));
        // dd($import->failures());
        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }
        return back()->withStatus('Candidates imported successfully.');
    }

    public function export() 
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function changestatus($id)
    {
        $user = Employee::find($id);
        $user->is_active=!$user->is_active;
        if($user->save())
        {
  
            return redirect()->back();
        }
        else {
           
            return redirect(route('employees.changestatus'));
        }
    }

    public function verify($id)
    {
        $user = Employee::find($id);
        return view('employees.verify')->with([
            'user' =>$user]
        );
    }

    public function employees_details($id)
    {
        $name = session()->get('first_name');
        if(empty($name)){
            return redirect()->route('login');
        }
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->get($this->API.'employee-profile/'.$id);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $user = $data->response->data->employee;
        $user_docs = $data->response->data->user_docs;
        $verification_types = $data->response->data->verification_types;
        $employee_lookup_histories = $data->response->data->employee_lookup_histories;

        return view('employees.verify')->with([
            'user' =>$user,
            'user_docs' => $user_docs,
            'verification_types' => $verification_types,
            'employee_lookup_histories' => $employee_lookup_histories
        ]);
    }

    public function profile()
    {
        $name = session()->get('first_name');
        
        if(empty($name)){
            return redirect()->route('login');
        }
        $api_token = session()->get('api_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer ".$api_token
        ])->get($this->API.'account-info');

        $contents = $response->getBody();
        $data = json_decode($contents);
        $account = $data->response->data->employer;
        $preferences = $data->response->data->prefs;
        if($account == "Trying to get property 'id' of non-object")
        {
            $account=NULL;
        }
        return view('employees.profile')->with([
            'account' => $account,
            'preferences' => $preferences
        ]);
    }

    public function search()
    {
        $api_token = session()->get('api_token');
        // $response = Http::withHeaders([
        //                     // 'Accept' => 'application/json',
        //                     'Authorization' => "Bearer ".$api_token
        //                 ])->get('https://api.gettruehelp.com/api/get-candidates');
        // $contents = $response->getBody();
        // $data = json_decode($contents);

        // if(isset($data->response)) {
        //     if($data->response->status != 200){
        //         $employees = NULL;
        //     } else {
        //         $employees = $data->response->data;
        //     }
        // } else {
        //     $employees = NULL;
        // }

        // if(is_array($employees))
        //     // dd("ddddddd");
        // $employees = array_reverse($employees);    

        $device_id = "00000000-89ABCDEF-01234567-89ABCDEH";
        $source = "B2B";
        $response = Http::post($this->API.'employee-types', [
            'device_id' => $device_id,
            'source' => $source,
        ]);

        $contents = $response->getBody();

        $data = json_decode($contents);

        // dd($data);
        $emp_type = $data->response->data;
        return view('employees.search', compact('emp_type'));

    }

    public function accounts()
    {
        $name = session()->get('first_name');
        
        if(empty($name)){
            return redirect()->route('login');
        }
        $api_token = session()->get('api_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer ".$api_token
        ])->get($this->API.'account-info');

        $contents = $response->getBody();
        $data = json_decode($contents);
        $account = $data->response->data->employer;
        $preferences = $data->response->data->prefs;
        if($account == "Trying to get property 'id' of non-object")
        {
            $account=NULL;
        }
        return view('accounts.profile')->with([
            'account' => $account,
            'preferences' => $preferences
        ]);
    }

    public function notifications()
    {
        $name = session()->get('first_name');
        if(empty($name)){
            return redirect()->route('login');
        }
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        // dd($api_token);
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->post($this->API.'notification',[
                            'api_key' => $apiKeys
                        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        // dd($data);
        $nf_message = $data->response->data->messages;
        return view('pages.notifications')->with('nf_message', $nf_message);
        // return view('pages.notifications');
    }

    public function employees()
    {
        $api_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTZiNWRkYzExODI0ZmYxY2ZhYTY4MDFkZTE0MDA4NGZiMDRiZGM5NjAwMzY5YWUyMDdiNmNjYzk4MmU4ODdiZGJmYTJhZjQwZGRlZTA2YmEiLCJpYXQiOjE1OTk3MjI3MDYsIm5iZiI6MTU5OTcyMjcwNiwiZXhwIjoxNjMxMjU4NzA2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.tzRW8mXQ_XrfzcPEig8jpChf99ywjeHcKpz_P5k7fK4TfgrvRYbx8eLzGgnnsjODZHDTxeqUZSGkSNlzK7CgAyjdRYtBpt6-XtH9vbwIK2Ks50vSVrk2xwSnlAUmf7fd_YhOdqfkzCuxPArqOBm8ls4Npw6bbqbkSE0AOHXYCUEkur4saTPKfeZphAqQ63cdwh-Y0luYnT7PpFgJjjpLfoUM51hOGL1oR4UzPkIT0CtXbtSnonuZbCkN1ZjeUWKB3f14vJxmoqB7B7UGuVI4NdO4WyuGv6E8o_tRse6aKUR6q4O0dXCwIQHCVlP7qzs4_zsezlcE5gi5k9yBsoOEUKdPOZbyUU5xVxmz0dh4V2AbkcdTt9_xZDYDfny5uTdQP154lLwDFlvF7XGTJVIkSFBbZMGgh1SYKKGuQGOsecZ2LNolDKGvxRF3PmXlbXDEjiY91NFmud1X8iIhXYy58n4C-31Lh9l_mkYSZIpL5VG1cdIIzaMeIk8RV6p-IL2IZz87SBEHVNbH5K-lC1Uc_kOUoXHoOimi-Rqa46AncJLS06YQ1rr1lJwqwgcfQhttTkzKmUrX5M22ibuMilQyPSe2erTOtyWEG9YqdmXWa6MHSffA4gOGLU_be8Ed2AS_kHDXDWnm0oW9-ZgO1Kw21Us3oGJueVV2dm20D9Ihmus";
        $response = Http::withHeaders([
                            // 'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->get($this->API.'get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $employees = $data->response;
        return json_encode($employees);
    }

    public function seenNotification($id){
        $name = session()->get('first_name');
        if(empty($name)){
            return redirect()->route('login');
        }
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->post($this->API.'seenNotification',[
                            'api_key' => $apiKeys,
                            'id' => $id
                        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);

        return redirect('surveys/reports') ;
    }
}