<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'max:13', 'unique:users'],
            'email' => '',
            'password' => ['required', 'string','confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $response = Http::post('https://api.gettruehelp.com/api/register-employer', [
            'email' => $data['email'],
            'first_name' => $data['name'],
            "last_name" => 'Truehelp',
            'source_name' => 'B2B',
            'device_id' => '00000000-89ABCDEF-01234567-89ABCDEH',
            'dob' => '2000-11-22',
            'mac_address' => '00:00:00:00',
            'gender' => 'M',
            'employer_type' => 'SCHOOL',
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
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
