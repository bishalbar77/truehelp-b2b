<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = Employee::where('is_active','0')->count();
        $empcount = Employee::where([
            'user_type' => 'Employee'
        ])->count();
        return view('home')->with([
            'count' => $userCount,
            'empcount' => $empcount,
        ]);
    }
}
