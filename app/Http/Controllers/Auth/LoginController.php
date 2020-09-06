<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo;

    public function adminLogin(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password])) {
            ;
            return redirect()->route('admin.dashboard');
            //return redirect()->intended(route('user.dashboard'));

        } else {
            return redirect()->back()->with(['message'=>'Emsail And Password Missmatched']);
        }

        // if unsuccessful, then redirect back to the login with the form data
        //return redirect()->back()->withInput($request->only('mobile', 'remember'));
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
