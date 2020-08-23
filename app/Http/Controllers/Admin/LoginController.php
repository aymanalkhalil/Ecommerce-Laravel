<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.authAdmin.login');

    }


    public function login(LoginRequest $request)
    {
        // $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['admin_email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.index');

        } else {
            return redirect()->back()->with(['error' => 'Wrong Information, please check again']);
        }
    }
    public function logout()
    {
        // Auth::logout();

        Auth::guard('admin')->logout();

        return redirect('/admin/login')->with(['message' => 'Logged Out Successfully']);
    }
}
