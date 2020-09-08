<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

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

    // use AuthenticatesUsers;

    // *
    //  * Where to redirect users after login.
    //  *
    //  * @var string
     
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function login()
    {
        return view('auth.login');
    }

    public function loginotp()
    {
        return view('auth.sendOtp');
    }

    public function loginProcess(Request $request)
    {
        // dd($request);
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $email = $request->email;
        $password = $request->password;   

        $response = Http::post('https://api.gettruehelp.com/api/login-by-email', [
            'email' => $email,
            'password' => $password,
            'api_key' => $apiKeys,
        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);

        if($data->response->status != 200){
            $message = 'Incorrect Email or Password';
            session()->flash('msg', $message);
            return redirect()->back();
        }
        session()->put('first_name', $data->response->data->first_name);
        session()->put('api_token', $data->response->data->api_token);
        return redirect()->route('home');
    }

    public function sendotp(Request $request)
    {
        try 
        {
            $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
            $mobile = $request->mobile;
            $device_id = '00000000-89ABCDEF-01234567-89ABCDEH';   

            $response = Http::post('https://api.gettruehelp.com/api/send-otp', [
                'mobile' => $mobile,
                'device_id' => $device_id,
                'api_key' => $apiKeys,
            ]);

            $contents = $response->getBody();
            $data = json_decode($contents);
        // dd($response);
            if($data->response->status != 200){
                return view('auth.login');
            }
            return view('auth.veriifyOtp')->with([
                'mobile' => $mobile
            ]);
        }
        catch (\Exception $e) {
            return $contents;
        }
    }

    public function checkotp(Request $request)
    {
        try 
        {
            $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
            $mobile = $request->mobile;
            $otp = $request->OTP;   
            $device_id = '00000000-89ABCDEF-01234567-89ABCDEH';   

            $response = Http::post('https://api.gettruehelp.com/api/verify-otp', [
                'mobile' => $mobile,
                'otp' => $otp,
                'device_id' => $device_id,
                'api_key' => $apiKeys,
            ]);
            $contents = $response->getBody();
            $data = json_decode($contents);
            if($data->response->status != 200){
                return view('auth.login');
            }
            session()->put('first_name', $data->response->data->first_name);
            session()->put('api_token', $data->response->data->token);
            return redirect()->route('home');
        }
        catch (\Exception $e) {
            return $response;
        }
    }

    public function logout(){
        session()->forget('first_name');
        return redirect()->route('login');
    }
}
