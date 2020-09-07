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
    public function index()
    {
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

        $device_id = "00000000-89ABCDEF-01234567-89ABCDEH";
        $source = "B2B";
        $response = Http::post('https://api.gettruehelp.com/api/employee-types', [
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
            ->post('https://api.gettruehelp.com/api/register-students', [
            'co_relation' => $co_relation,
            'parent_email' => $parent_email,
            'parent_mobile' => $parent_mobile,
            'parent_first_name' => $parent_first_name,
            'parent_middle_name' => $parent_middle_name,
            'parent_last_name' => $parent_last_name,
            'parent_dob' => $parent_dob,
            'parent_gender' => $parent_gender,
            'email' => $email,
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
                        ])->get('https://api.gettruehelp.com/api/employee-profile/'.$id);
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
        return view('employees.profile');
    }

    public function search()
    {
        return view('employees.search');
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
        ])->get('https://api.gettruehelp.com/api/account-info');

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
}