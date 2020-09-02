<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class RegisterApiController extends Controller
{
    protected function create(Request $request)
    {
        $name = $request->name;   
        $email = $request->email;   
        $mobile = $request->mobile;
        $password = $request->password;   
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $response = Http::post('https://api.gettruehelp.com/api/register-employer', [
            'email' => $email,
            'first_name' => $name,
            "last_name" => 'Truehelp',
            'source_name' => 'B2B',
            'device_id' => '00000000-89ABCDEF-01234567-89ABCDEH',
            'dob' => '2000-11-22',
            'mac_address' => '00:00:00:00',
            'gender' => 'M',
            'employer_type' => 'SCHOOL',
            'mobile' => $mobile,
            'password' => Hash::make($password),
            'api_key' => $apiKeys,
        ]);
        $contents = $response->getBody();
        $registerdata = json_decode($contents);

        if($registerdata->response->status != 200){
            return redirect()->back();
        }
        return redirect()->route('login');

    }
}
