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
use App\Imports\StudentImport;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{   

    // protected $API = "http://127.0.0.1:8001/api/";
    protected $API = "https://api.gettruehelp.com/api/";

    public function index()
    {
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
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
        // dd($emp_type);
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
    }

    public function import(Request $request)
    {  
        $this->validate($request, [
        'select_file'  => 'required|mimes:xls,xlsx'
        ]);
        $importFile = $request->select_file;
        $Import = new EmployeesImport();
        $ts = Excel::import($Import, $importFile);
        // dd($Import->sheetData);
        $Import = $Import->sheetData;
        $data = json_decode(json_encode($Import),true);
        // dd($data);
        return view('pages.test', compact('data'));
    }

    public function import1()
    {  
    
        return view('employees.upload_v1');
    }

    public function test()
    {
        return view('pages.upload');
    }

    public function uploaddata(Request $request)
    {  
        $api_token = session()->get('api_token');
        $co_relation = $request->co_relation;
        $parent_email = $request->parent_email;
        $parent_mobile = $request->parent_mobile;
        $parent_first_name = $request->parent_first_name;
        $parent_middle_name = $request->parent_middle_name;
        $parent_last_name = $request->parent_last_name;
        $parent_dob = $request->parent_dob;
        $parent_gender = $request->parent_gender;
        $email= $request->email;
        $mobile = $request->mobile;
        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $student_code = $request->student_code;
        $dob = $request->dob;
        $gender= $request->gender;
        $employee_types_id = $request->employee_types_id;
        
        foreach($first_name as $key => $no)
        {
            $response = Http::withHeaders(['Authorization' => "Bearer ".$api_token])
                ->post($this->API.'register-students', [
                'co_relation' => $co_relation[$key],
                'parent_email' => $parent_email[$key],
                'parent_mobile' =>  $parent_mobile[$key],
                'parent_first_name' =>  $parent_first_name[$key],
                'parent_middle_name' => $parent_middle_name[$key],
                'parent_last_name' =>  $parent_last_name[$key],
                'parent_dob' => $parent_dob[$key],
                'parent_gender' =>  $parent_gender[$key],
                'email' => $email[$key],
                'country_code' => $country_code[$key] ?? "91",
                'mobile' => $mobile[$key],
                'first_name' =>$first_name[$key],
                'middle_name' => $middle_name[$key],
                'last_name' => $last_name[$key],
                'student_code' => $student_code[$key],
                'dob' => $dob[$key],
                'gender' => $gender[$key],
                'source_name' =>"B2B",
                'employee_types_id' => $employee_types_id[$key]
            ]);
        }
        $contents = $response->getBody();
        $data = json_decode($contents);
        $message = $data->response->message;
        Session::flash('message', $message);
        return redirect('/employees') ;
    }

    public function export() 
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function studentexport() 
    {
        return Excel::download(new StudentExport, 'students.xlsx');
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
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->get($this->API.'employee-profile/'.$id);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $user = $data->response->data->employee;
        $user_pics = $data->response->data->user_pics;
        $user_docs = $data->response->data->user_docs;
        $verification_types = $data->response->data->verification_types;
        $employee_lookup_histories = $data->response->data->employee_lookup_histories;

        return view('employees.verify')->with([
            'user' =>$user,
            'user_docs' => $user_docs,
            'verification_types' => $verification_types,
            'employee_lookup_histories' => $employee_lookup_histories,
            'user_pics' => $user_pics,
            'id' => $id,
        ]);
    }

    public function changepreferences(Request $request)
    {
        $api_token = session()->get('api_token');
        $notify_by_sms = $request->notify_by_sms ?? "N";
        $notify_by_email = $request->notify_by_email ?? "N";
        $notify_by_wa = $request->notify_by_wa ?? "N";
        $time_zone = $request->time_zone;
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                            ])->post($this->API.'change_preference',[
                                'notify_by_sms' => $notify_by_sms,
                                'notify_by_email' => $notify_by_email,
                                'notify_by_wa' => $notify_by_wa,
                                'time_zone' => $time_zone
                            ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        return redirect('/profile');
    }

    public function photo(Request $request)
    {
        $api_token = session()->get('api_token');
        $employee_id = $request->employee_id;
        $photo = $request->file('file');
        $source = "B2B";
        $postData =[
            'employee_id' => $employee_id,
            'photo' => $photo,
            'source' => $source
        ];
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                            ])->post($this->API.'upload-employee-photo',$postData);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $user = $data->response;
        // dd($postData);
        return redirect(route('employees.index'));
    }

    public function profile()
    {
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
        $device_id = "00000000-89ABCDEF-01234567-89ABCDEH";
        $source = "B2B";
        $response = Http::post($this->API.'employee-types', [
            'device_id' => $device_id,
            'source' => $source,
        ]);

        $contents = $response->getBody();

        $data = json_decode($contents);
        $emp_type = $data->response->data;
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
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
        return view('employees.search', compact('emp_type','employees'));

    }

    public function accounts()
    {
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
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->post($this->API.'notification',[
                            'api_key' => $apiKeys
                        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $nf_message = $data->response->data->messages;
        return view('pages.notifications')->with('nf_message', $nf_message);
    }

    public function employees()
    {
        
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->get($this->API.'get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $employees = $data->response;
        echo json_encode($employees);
    }

    public function searchjson()
    {
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->get($this->API.'get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $employees = $data->response->data;
        return json_encode($employees);
    }

    public function seenNotification($id)
    {
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
        $employees = $data->response->data->messages;
        return Redirect::to($employees);
    }
}