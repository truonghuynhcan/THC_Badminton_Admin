<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        if(Auth::check()) { // Kiểm tra nếu người dùng đã đăng nhập
            return back();
        }
        return view('page.login');
    }
    public function postLogin(Request $req){
        $email = $req->input('email');
        $pass = $req->input('password');
        $remember = $req->input('remember');
        
        $user=User::where('email',$email)->first();
        $canLogin=false;
        if(isset($user)){
            $canLogin=Hash::check($pass,$user->password);
        }else{
            session()->put('warning','Tài khoản không tồn tại!');
            return back();
        }

        if ($canLogin) {//cho đăng nhập
            Auth::login($user,$remember);
            return redirect()->route('dashboard');
        }else{
            session()->put('warning','Mật khẩu không đúng!');
            return back();
        }
    }
    
    public function register(){
        if(Auth::check()) { // Kiểm tra nếu người dùng đã đăng nhập
            return back();
        }
        return view('page.register');
    }
    public function postRegister(Request $req){
        $name=$req->input('name');
        $email=$req->input('email');
        $pass=$req->input('pass');
        $repass=$req->input('repass');

        if($pass!==$repass){
            Session()->put('message','Mật khẩu xác thực không trùng khớp!');
            return back();
        }
        $user=User::where('email',$email)->first();
        if(isset($user)){
            $req->session()->put('message','Email đã tồn tại!');
            return back();
        }else{
            $user = new User();
            $user->name=$name;
            $user->email=$email;
            $user->password=$pass;
            $user->role='2';
            $user->save();
            Session()->put('success','Đăng ký thành công. Hãy đăng nhập để kích hoạt!');
            return redirect()->route('login');
        }
    }
   
    public function logout() {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
    
        return redirect()->route('login');
    }
    
}
