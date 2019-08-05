<?php

namespace App\Http\Controllers\Auth;

use App\Group;
use App\Role;
use App\Rules\RoleSecret;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/home';

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
        if(!array_key_exists('secret', $data))
        {
            $data['secret'] = "";
        }

        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'group' => ['required', 'integer'],
            'role' => ['required', 'integer'],
            'secret' => ['string', new RoleSecret($data['role'])],
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
        $user = new User();

        $user->first_name = $data['firstName'];
        $user->last_name = $data['lastName'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->api_token = Str::random(60);
        $user->role_id = $data['role'];

        $role = Role::findOrFail($data['role']);

        $user->role()->associate($role);

        $user->save();

        $group = Group::findOrFail($data['group']);

        $user->groups()->attach($group);

        return $user;

        /*
        return User::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => (int)$data['role'],
            'api_token' => Str::random(60)
        ]);
        */
    }

    // Overriding Illuminate\Foundation\Auth\RegistersUsers
    // to pass variable to the register view
    public function showRegistrationForm()
    {
        $roles = Role::all('id', 'name');
        $groups = Group::all('id', 'name');

        return view('auth.register', [
            'roles' => $roles,
            'groups' => $groups
        ]);
    }
}
