<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\File; //xử lý file

class UserController extends Controller
{
    public function listUsers()
    {
        $users = Products::paginate(5);
        return view('admin.users.list-user')
            ->with([
                'users' => $users
            ]);
    }
}
