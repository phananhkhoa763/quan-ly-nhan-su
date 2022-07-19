<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(LoginRequest $request){
        $data = $request->getData();
        $email = $data['email'];
        $password = $data['password'];
        var_dump( $data );die;
        if(Auth::attempt(['email' => $email, 'password' =>$password])) {
          return redirect()->route('admins.dashboard.index');
        } else {
            return redirect()->route('login')->with('msg','Email hoặc mật khẩu không đúng');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

