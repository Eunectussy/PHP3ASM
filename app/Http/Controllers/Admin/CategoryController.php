<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryRequest;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $cate = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.category.list-category')
            ->with([
                'cate' => $cate
            ]);
    }
    public function addCategory()
    {
        return view('admin.category.add-category');
    }
    public function addPostCategory(AdminCategoryRequest $req)
    {
        $data = [
            'name' => $req->nameCate,
        ];
        Category::create($data);

        return redirect()->route('admin.category.listCategory')
            ->with([
                'message' => 'Thêm mới thành công'
            ]);
    }
    public function deleteCategory(Request $req){
        Products::where('category_id', $req->id)->delete();
        Category::where('id', $req->id)->delete();
        return redirect()->route('admin.category.listCategory')->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function detailCategory($id){
        $productcount = Products::select()
        ->where('products.category_id', $id)->count();
        $category = Category::select()->where('id', $id)->first();
        return view('admin.category.detail-category')
            ->with([
                'productCount' => $productcount,
                'category' => $category
            ]);
    }
    public function updateCategory($id){
        $category = Category::where('id', $id)->first();
        return view('admin.category.update-category')
            ->with([
                'category' => $category
            ]);
    }
    public function updatePatchCategory($id, AdminCategoryRequest $req){
        $data = [
            'name' => $req->nameCate,
        ];
        Category::where('id', $id)->update($data);
        return redirect()->route('admin.category.listCategory')->with([
            'message' => 'Sửa thành công'
        ]);

    }
}
