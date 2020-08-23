<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\Users\User;
use App\Models\Users\VerifyUser;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

use App\Http\Requests\UserRegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

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
        return view('public.auth.register');
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(UserRegisterRequest $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile_no' => $data['mobile_no'],
            'address' => $data['address']
        ]);

        VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);
        Mail::to($user->email)->send(new VerifyMail($user));

        return redirect()->route('register')->with(['success' => 'Account Created, please check your email !']);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect()->route('login')->with(['success' => 'Account Created, please check your email !']);
    }

    public function verifyEmail($token)
    {

        $verify = VerifyUser::where('token', $token)->firstOrFail();

        $user = $verify->user;

        if ($user->verified) {
            return redirect()->route('login')->with(['error' => 'This Account is Already Verified !']);
        } else {
            $verify->user->verified = true;
            $verify->user->save();
            return redirect()->route('login')->with(['success' => 'Thanks, your email has been verified !']);

        }
    }
}
