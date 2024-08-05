<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\Http\Requests\AdminUserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File; //xử lý file
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUsers()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        // $password = Crypt::decryptString($users->password);
        return view('admin.users.list-user')
            ->with([
                'users' => $users,
                // 'password' => $password
            ]);
    }
    public function addUsers()
    {
        return view('admin.users.add-user');
    }
    public function addPostUsers(AdminProductRequest $req){
            $data = [
                'name' => $req->nameUser,
                'email' => $req->emailUser,
                'password' =>Hash::make($req->password),
                'role' => $req->role,
            ];
            Users::create($data);

            return redirect()->route('admin.user.listUsers')
            ->with([
                'message' => 'Thêm mới thành công'
            ]);
        
    }
    public function deleteUsers(Request $req){
        Users::where('id', $req->id)->delete();
        return redirect()->route('admin.user.listUsers')->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function detailUsers($id){
        $users = Users::select()
        ->where('id', $id)->first();
        return view('admin.users.detail-user')
            ->with([
                'users' => $users
            ]);
    }
    public function updateUsers($id){
        $user = Users::where('id', $id)->first();
        return view('admin.users.update-user')
            ->with([
                'users' => $user
            ]);
    }
    public function updatePatchUsers($id, UserUpdateRequest $req){
        $data = [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'password' =>Hash::make($req->password),
            'role' => $req->role,
        ];
        Users::where('id', $id)->update($data);
        return redirect()->route('admin.user.listUsers')->with([
            'message' => 'Sửa thành công'
        ]);

    }
}
