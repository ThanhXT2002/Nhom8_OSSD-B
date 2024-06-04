<?php

namespace App\Http\Controllers\Fontend;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AccountController extends Controller
{

     public function showLoginForm()
    {
        if(Auth::id()>0){
            return view('fontend.home.index');
        }
        return view('fontend.account.login');
    }

     public function showRegisterForm()
    {
        
        return view('fontend.account.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            
        ]);

        $credentials = [
            'email' => $request->input('email'), 
            'password' => $request->input('password'),
        ];
       

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->route('home',['user' => $user]
            )->with('success','Đăng nhập thành công');
        }
        return redirect()->route('account.loginForm')->with('error','Email hoặc mật khẩu không chính xác!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('account.loginForm')->with('success','Đăng xuất thành công');;
    }

    public function register(RegisterRequest $request)
    {
        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Chuyển hướng đến trang đăng nhập với thông báo thành công
        return redirect()->route('account.loginForm')->with('success', 'Đăng ký thành công! Hãy đăng nhập.');
    }
}
