<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Imports\StudentImport;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = session()->get('first_name');
        if(empty($name)){
            return redirect()->route('login');
        }
        $employees = Employee::all();
        return view('student.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $users = new Employee;
        $users->first_name = $request->first_name;
        $users->middle_name = $request->middle_name;
        $users->last_name = $request->last_name;
        $users->dob = $request->dob;
        $users->mobile = $request->mobile;
        $users->email = $request->email;
        $users->address = $request->address;
        $users->gender = $request->gender;
        $users->password = Hash::make('admin123');
        $users->guardian_name = $request->guardian_name;
        $users->guardian_phone = $request->guardian_phone;
        $users->guardian_relation = $request->guardian_relation;
        $users->user_type = 'Student';
        $users->save();
        return redirect()->route('student.index');
    }

    public function import(Request $request)
    {  
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);
        Excel::import(new StudentImport,request()->file('select_file'));    
        return back();
    }

    public function export() 
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
}
