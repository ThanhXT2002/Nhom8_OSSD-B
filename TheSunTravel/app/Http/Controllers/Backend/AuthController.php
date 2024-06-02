<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
   

    public function index()
    {
        if(Auth::id()>0){
            return redirect()->route('dashboard.index');
        }
        return view('backend.auth.login');
    }
    public function login(AuthRequest $request){
        $credentials = [
            'email' => $request->input('email'), 
            'password' => $request->input('password')
        ];
       if(Auth::attempt($credentials))
       {
            $user = Auth::user();
            return redirect()->route('dashboard.index',['user' => $user]
            )->with('success','Đăng nhập thành công');
       }
       return redirect()->route('auth.admin')->with('error','Email hoặc mật khẩu không chính xác!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
}
