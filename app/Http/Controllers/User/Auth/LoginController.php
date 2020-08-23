<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function getLogin()
    {
        return view('public.auth.login');
    }

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }


    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            Auth::guard()->logout();
            return redirect()->back()->with(['error' => 'You need to verify your email first']);
        }
        return redirect()->route('homepage');
    }



    // protected function validateLogin(Request $request)
    // {

    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             'email' => 'required|string',
    //             'password' => 'required|string',

    //         ],
    //         [

    //             'required' => 'This field is required',
    //         ]);

    //     if ($validator->fails()) {
    //         return $validator->errors();
    //     }
    // }
}
