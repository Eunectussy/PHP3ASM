<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //authen
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;

class AuthenController extends Controller
{
    public function login(){
        return view('login');
    }
    public function postLogin(UserLoginRequest $req){

        $remember = $req->has('remember');
        if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ], $remember)) {
            if(Auth::user()->role == '1'){
            return redirect()->route('admin.product.listProducts');}
            else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->back()->with([
                'messageError' => 'Email hoặc mật khẩu không đúng'
            ]);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with([
            'messageError' => 'Đăng xuất thành công'
        ]);
    }
    public function register(){
        return view('register');
    }
    public function postRegister(AdminUserRequest $req){
        $check = Users::where('email', $req->email)->exists();
        if ($check){
            return redirect()->back()->with([
                'message' => 'Email đã tồn tại'
            ]);
        }else{
            $data = [
                'nameUser' => $req->name,
                'emailUser' => $req->email,
                'password' =>Hash::make($req->password)
            ];
            $newUser = Users::create($data);
            return redirect()->back()->with([
                'message' => 'Đăng kí thành công. Vui lòng đăng nhập'
            ]);
        }
    }
}
