<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //authen
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function login(){
        return view('login');
    }
    public function postLogin(Request $req){
        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',
        ]);
        $remember = $req->has('remember');
        if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ], $remember)) {
            return redirect()->route('admin.product.listProducts');
        }else{
            return redirect()->back()->with([
                'messageError' => 'Email hoặc mật khẩu không đúng'
            ]);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'messageError' => 'Đăng xuất thành công'
        ]);
    }
    public function register(){
        return view('register');
    }
    public function postRegister(Request $req){
        $check = Users::where('email', $req->email)->exists();
        if ($check){
            return redirect()->back()->with([
                'message' => 'Email đã tồn tại'
            ]);
        }else{
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' =>Hash::make($req->password)
            ];
            $newUser = Users::create($data);
            return redirect()->back()->with([
                'message' => 'Đăng kí thành công. Vui lòng đăng nhập'
            ]);
        }
    }
}
