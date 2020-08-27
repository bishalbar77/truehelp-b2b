<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $name = session()->get('name');
        if(empty($name)){
            return redirect()->route('login');
        }
        $userCount = User::count();
        return view('home')->with([
            'count' => $userCount
        ]);
    }
}
