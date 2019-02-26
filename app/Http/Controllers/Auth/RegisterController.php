<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Tea;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\NewUser;
use Illuminate\Support\Facades\Mail;

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
    protected $redirectTo = '/homeordash';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'national_id' => 'required|string|min:6|unique:users',
            'phone_no' => 'required|string|min:9|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

//     /**
//      * Create a new user instance after a valid registration.
//      *
//      * @param  array  $data
//      * @return \App\User
//      */
    protected function create(array $data)
    {
        $user= User::create([
            'f_name' => $data['firstname'],
            'l_name' => $data['lastname'],
            'national_id' => $data['national_id'],
            'phone_no' => $data['phone_no'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $expected_produce=  911* request('No_Acres');
        $bonus= $expected_produce * 28.80;
        $fert=   8 * request('No_Acres');
         $users= $user->id;
         $ferta = 6.0;
        $tea= Tea::create([
            'no_acres' => request('No_Acres'),
            'user_id' => $users,
            'no_of_fert' => $fert,
            'expected_produce' => $expected_produce,
            'bonus' => $bonus,
            'location' =>request('Location'),
            
        ]);
        $admins = User::where('role','admin')->get();
        foreach($admins as $admin){

        \Mail::to($admin->email)->send(new NewUser($user));
        }

        // $pr= array()
        return ($user);
        // dd($user);

       
    }
}
