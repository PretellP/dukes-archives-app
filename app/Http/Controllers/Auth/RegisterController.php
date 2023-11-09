<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\{Role, User};
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

    public function showRegistrationForm()
    {
        $roles = Role::get(['id', 'name']);
        $genders = config('parameters.genders') ;
        $document_types = config('parameters.document_types');
        rsort($genders);
        return view('auth.register', compact(
            'roles',
            'genders',
            'document_types'
        ));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

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
            'nickname' => ['required', 'string', 'max:100', 'unique:users,nickname'],
            'name' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'integer'],
            'birthdate' => ['required', 'date'],
            'document_type' => ['required', 'integer'],
            'document_number' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],         
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([          
            'nickname'=> $data['nickname'],
            'name'=> $data['name'],
            'lastname'=> $data['lastname'], 
            'gender'=> $data['gender'], 
            'birthdate'=> $data['birthdate'], 
            'document_type'=> $data['document_type'],
            'document_number'=> $data['document_number'],
            'phone'=> $data['phone'],
            'status'=> '1',
            'role_id'=> '3',
            'email' => $data['email'],            
            'password' => Hash::make($data['password']),
            
        ]);
    }
}
