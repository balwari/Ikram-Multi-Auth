<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $this->middleware('guest:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showAdminRegisterForm()
    {
        return view('admin.register', ['url' => 'admin']);
    }

    public function showUserRegisterForm()
    {
        return view('auth.register');
    }

    protected function createAdmin(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:admins,email',
            'password' => 'string|min:5|max:20|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|string|min:5|max:20'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique'    => ':attribute is already used',
        ];

        $admin_details =  $this->validate($request, $rules, $customMessages);
        $admin['email'] = $admin_details['email'];
        $admin['password'] = bcrypt($admin_details['password']);
             
        $create = Admin::create($admin);

        if(!$create){
            return redirect()->back()->with('err', 'Something went wrong in Registration');
        }
        return redirect()->route('admin-login')->with('message', 'Successfully Registered');
    }

    protected function createUser(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'string|min:5|max:20|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|string|min:5|max:20'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique'    => ':attribute is already used',
        ];

        $user_details =  $this->validate($request, $rules, $customMessages);
        $user['email'] = $user_details['email'];
        $user['password'] = bcrypt($user_details['password']);
             
        $create = User::create($user);

        if(!$create){
            return redirect()->back()->with('err', 'Something went wrong in Registration');
        }
        return redirect()->back()->with('message', 'Successfully Registered');
    }
}
