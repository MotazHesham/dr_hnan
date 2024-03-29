<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'service_id' => ['required'],
            'phone_number' => ['required'],
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
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone_number'    => $data['phone_number'],
            'password' => Hash::make($data['password']), 
            'user_type' => 'client', 
        ]);
        $form_files = array();
        if(array_key_exists('form_files',$data)){
            foreach($data['form_files'] as $key =>  $form_file){
                $form_files[$key] = $form_file->store('uploads/forms');  
            } 
        }
        $request_service = RequestService::create([ 
            'user_id' => $user->id,
            'service_id' => $data['service_id'], 
            'status' => 'pending',
            'fields' => array_key_exists('fields',$data) ? json_encode($data['fields']) : null,
            'form_file' => json_encode($form_files)
        ]);
        return $user;
    }
}
