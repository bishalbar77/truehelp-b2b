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
        // echo "<pre>";
        // print_r($data);
        // exit;
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

        return redirect()->route('employees.index');
    }

    public function import(Request $request)
    {  
        $this->validate($request, [
        'select_file'  => 'required|mimes:xls,xlsx'
        ]);
        Excel::import(new EmployeesImport,request()->file('select_file'));    
        // $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        // $api_token = session()->get('api_token');
        // $file = $request->select_file;
        // dd($file);
        // $response = Http::withHeaders(['Authorization' => "Bearer ".$api_token])
        //     ->post('https://api.gettruehelp.com/api/import-student', [
        //     'file' => $file,
        //     'api_key' => $apiKeys,
        // ]);
        // $contents = $response->getBody();
        // $data = json_decode($contents);
        // dd($response);
        return back();
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

    public function search()
    {
        return view('employees.search');
    }
}