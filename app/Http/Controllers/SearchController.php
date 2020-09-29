<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{

    protected $API = "https://api.gettruehelp.com/api/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTZiNWRkYzExODI0ZmYxY2ZhYTY4MDFkZTE0MDA4NGZiMDRiZGM5NjAwMzY5YWUyMDdiNmNjYzk4MmU4ODdiZGJmYTJhZjQwZGRlZTA2YmEiLCJpYXQiOjE1OTk3MjI3MDYsIm5iZiI6MTU5OTcyMjcwNiwiZXhwIjoxNjMxMjU4NzA2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.tzRW8mXQ_XrfzcPEig8jpChf99ywjeHcKpz_P5k7fK4TfgrvRYbx8eLzGgnnsjODZHDTxeqUZSGkSNlzK7CgAyjdRYtBpt6-XtH9vbwIK2Ks50vSVrk2xwSnlAUmf7fd_YhOdqfkzCuxPArqOBm8ls4Npw6bbqbkSE0AOHXYCUEkur4saTPKfeZphAqQ63cdwh-Y0luYnT7PpFgJjjpLfoUM51hOGL1oR4UzPkIT0CtXbtSnonuZbCkN1ZjeUWKB3f14vJxmoqB7B7UGuVI4NdO4WyuGv6E8o_tRse6aKUR6q4O0dXCwIQHCVlP7qzs4_zsezlcE5gi5k9yBsoOEUKdPOZbyUU5xVxmz0dh4V2AbkcdTt9_xZDYDfny5uTdQP154lLwDFlvF7XGTJVIkSFBbZMGgh1SYKKGuQGOsecZ2LNolDKGvxRF3PmXlbXDEjiY91NFmud1X8iIhXYy58n4C-31Lh9l_mkYSZIpL5VG1cdIIzaMeIk8RV6p-IL2IZz87SBEHVNbH5K-lC1Uc_kOUoXHoOimi-Rqa46AncJLS06YQ1rr1lJwqwgcfQhttTkzKmUrX5M22ibuMilQyPSe2erTOtyWEG9YqdmXWa6MHSffA4gOGLU_be8Ed2AS_kHDXDWnm0oW9-ZgO1Kw21Us3oGJueVV2dm20D9Ihmus";
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->get($this->API.'get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $employees = $data->response->data;
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer ".$api_token
        ])->post('https://api.gettruehelp.com/api/get-survey', [
            'api_key' => $apiKeys,
        ]);

        $contents = $response->getBody();
        $data = json_decode($contents);
        $orders = $data->response->data;

        $id = $request->employee_id;
        $count = count($id);
        if($count<2)
        {
            foreach($id as $key =>$no)
            {
                if(strlen($no) >=5 )
                {
                    return redirect()->route('surveys-details', $no);
                }
                return redirect()->route('employees-details', $no);
            }
        }
        else
        {
            return view('pages.search')->with([
                'id' => $id,
                'employees' => $employees,
                'orders' => $orders
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
