<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';

        $device_id = 'XXXXXXXXXXXXXXXXXXXXYYYYYY';

        $response = Http::post('https://api.gettruehelp.com/api/send-otp', [
            'mobile' => $request->mobile,
            'device_id' => $device_id,
            'api_key' => $apiKeys,
        ]);

        $contents = $response->getBody();

        $data = json_decode($contents);

        // echo '<pre>';
        // print_r($data);
        // exit;

        return view('auth.verifyotp', [
            'data' => $data
        ]);
    }

    public function verifyProcess(Request $request)
    {
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';

        $device_id = 'XXXXXXXXXXXXXXXXXXXXYYYYYY';

        $response = Http::post('http://localhost/gettruehelp/api/public/api/verify-otp', [
            'mobile' => $request->mobile,
            'device_id' => $device_id,
            'api_key' => $apiKeys,
            'otp' => $request->otp,
        ]);

        $contents = $response->getBody();

        $data = json_decode($contents);

        echo '<pre>';
        print_r($data);
        exit;
    }
}
