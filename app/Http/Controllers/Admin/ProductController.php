<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\File; //xử lý file

class ProductController extends Controller
{
    public function listProducts()
    {
        
        $products = Products::join('category', 'category.id', '=', 'products.category_id')
        ->select('products.id', 'products.name', 'products.price', 'products.image', 'category.name as catename', 'products.created_at', 'products.updated_at')
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('admin.products.list-product')
            ->with([
                'products' => $products
            ]);
    }
    public function addProducts()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.products.add-product')->with([
            'cate' => $categories
        ]);
    }
    public function addPostProducts(AdminProductRequest $req)
    {
        $imageUrl = '';
        if ($req->hasFile('imageProduct')) {
            $image = $req->file('imageProduct');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "imageProducts/";
            $image->move(public_path($link), $nameImage);
            $imageUrl = $link . $nameImage;
        }
        $data = [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'image' => $imageUrl,
            'category_id' => $req->categoryProduct,
            'description' => $req->desc,
        ];
        Products::create($data);

        return redirect()->route('admin.product.listProducts')
            ->with([
                'message' => 'Thêm mới thành công'
            ]);
    }
    public function deleteProduct(Request $req){
        $product = Products::where('id', $req->id)->first();
        if($product->image != null && $product->image != ''){
            File::delete(public_path($product->image));
        }
        Products::where('id', $req->id)->delete();
        return redirect()->route('admin.product.listProducts')->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function detailProduct($id){
        $product = Products::join('category', 'category.id', '=', 'products.category_id')
        ->select('products.id', 'products.name', 'products.price', 'products.image', 'products.description', 'category.name as catename', 'products.created_at', 'products.updated_at')
        ->where('products.id', $id)->first();
        return view('admin.products.detail-product')
            ->with([
                'product' => $product
            ]);
    }
    public function updateProduct($id){
        $product = Products::where('id', $id)->first();
        $categories = Category::select('id', 'name')->get();
        return view('admin.products.update-product')
            ->with([
                'product' => $product,
                'cate' => $categories

            ]);
    }
    public function updatePatchProduct($id, AdminProductRequest $req){
        $product = Products::where('id', $id)->first();
        $linkImage = $product->image;
        if($req->hasFile('imageProduct')){
            File::delete(public_path($product->image));
            $image = $req->file('imageProduct');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "imageProducts/";
            $image->move(public_path($link), $nameImage);
            $linkImage = $link . $nameImage;
        }
        $data = [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'image' => $linkImage,
            'category_id' => $req->categoryProduct,
            'description' => $req->desc,

        ];
        Products::where('id', $id)->update($data);
        return redirect()->route('admin.product.listProducts')->with([
            'message' => 'Sửa thành công'
        ]);

    }
}
