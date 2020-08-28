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

class EmployeeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        $name = session()->get('first_name');
        if(empty($name)){
            return redirect()->route('login');
        }
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
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
        $users->save();

        return redirect()->route('employees.index');
    }

    public function edit(User $employee)
    {
        abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, User $employee)
    {
        $employee->update($request->all());

        return redirect()->route('admin.employees.index');
    }

    public function show(User $employee)
    {

        return view('admin.employees.show', compact('employee'));
    }

    public function destroy(User $employee)
    {

        $employee->delete();

        return back();
    }

    public function import(Request $request)
    {  
        $this->validate($request, [
        'select_file'  => 'required|mimes:xls,xlsx'
        ]);
        Excel::import(new EmployeesImport,request()->file('select_file'));    
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
  
            return redirect()->back()->with('disabled', 'User status have been changed');
        }
        else {
           
            return redirect(route('employees.changestatus'))->with('disabled', 'User have status have been changed');
            
        }
    }
}