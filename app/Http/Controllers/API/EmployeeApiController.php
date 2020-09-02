<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class EmployeeApiController extends Controller
{

    public function index(Request $request)
    {
       try
       {
           $users = User::select([
               'id', 'first_name', 'name'
           ])->get();

           return response()->json([
               'response' => [
                   'status' => 200,
                   'data' => $users,
                   'message' => 'success',
               ]
            ], 200);
       }

       catch (\Exception $e)
       {
            return response()->json([
                'response' => [
                    'status' => 'failed',
                    'data' => $e->getMessage(),
                    'message' => 'failed',
                ]
             ], 500);
       }
    }

    public function store(Request $request)
    {
        $employee = User::create($request->all());

        return (new EmployeeResource($employee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function users()
    {
        $users = User::select(['id', 'first_name', 'last_name', 'email']);
        dd($users);
        return Datatables::of($users)
            ->make(true);
        
    }

    public function update(Request $request, User $employee)
    {
        $employee->update($request->all());

        return (new EmployeeResource($employee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $employee)
    {
        $employee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}