<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $redirectTo = 'dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('adminLogout');
        $this->middleware('auth:admin')->only('adminLogout');
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    protected function guard(){
        return Auth::guard("admin");
    }


    public function adminLogin(Request $request){

        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:8'
        ]);
//
//        $admin=Admin::where('email',$request->email)->first();
//        $correct=\Hash::check($request->password, $admin->password);
//        \Log::info("password correct ".$correct);
//        \Log::info(['email' => $request->email, 'password' => $request->password]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
//
//            \Log::info("login successs");
            return redirect()->intended('/dashboard/statics');
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors(["Incorrect Credentials"]);
    }




    public function adminLogout(Request $request)
    {
        $this->guard('admin')->logout();

        $sessionKey=$this->guard('admin')->getName();
        $request->session()->forget($sessionKey);


        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/admin/login');
    }




}
