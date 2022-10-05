<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller
{

    public function adualt()
    {
        return view('customAuth.index');
    }

    public function site()
    {
        return view('site');

    }

    public function admin()
    {
//
//return Auth::guard()->user();
        return view('admin.admin');
    }


    public function Login()
    {
        if(Auth::guard('admin')->check())
            return redirect()->intended('/admin');

        elseif(Auth::guard('sub_admins')->check())
            return redirect()->intended('/sub_admins');


        return view('auth.login');
    }


    public function checklogin(Request $request)
    {

        if ($request->type=="admin"){

            $this->validate($request, [
                'username'   => 'required|exists:admins',
                'password' => 'required|min:6'
            ]);


            if (Auth::guard('admin')->attempt(['username' => $request->username,

                'password' => $request->password])) {

                return redirect()->intended('/admin');

            }
            return back()->withInput($request->only('username'));

        }

        if ($request->type=="sub_admin"){
            $this->validate($request, [
                'username'   => 'required',
                'password' => 'required|min:6'
            ]);
            if (Auth::guard('sub_admins')->attempt(['username' => $request->username,
                'password' => $request->password])) {
                return redirect()->intended('/sub_admins');
            }
            return back()->withInput($request->only('username'));

        }
  if ($request->type=="user"){
            $this->validate($request, [
                'username'   => 'required',
                'password' => 'required|min:6'
            ]);
            if (Auth::guard('web')->attempt(['username' => $request->username,
                'password' => $request->password])) {
                return redirect()->intended('/home');
            }
            return back()->withInput($request->only('username'));

        }


    }
   public function sub_admins()
    {
      //  return 'sub_admins.sub_admins';
         return view('sub_admins.sub_admins');
    }


}
