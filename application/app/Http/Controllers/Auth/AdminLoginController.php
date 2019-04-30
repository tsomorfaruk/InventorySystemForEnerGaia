<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);



        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location

            return redirect(route('admin.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        /*Auth::guard('admin')->logout();
        return redirect('/admin');*/
        /*if(Auth::guard('admin')->check()) $redirect = '/admin';
        else $redirect = '/';

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($redirect);*/

        Auth::guard('admin')->logout();
        //$request->session()->flush();
        //$request->session()->regenerate();
        return redirect()->guest(route( 'admin.login' ));
    }

}