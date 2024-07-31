<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\File; //xử lý file

class ProductController extends Controller
{
    public function listProducts()
    {
        $products = Products::paginate(5);
        return view('admin.products.list-product')
            ->with([
                'products' => $products
            ]);
    }
    public function addProducts()
    {
        return view('admin.products.add-product');
    }
    public function addPostProducts(Request $req)
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
        $product = Products::where('id', $id)->first();
        return view('admin.products.detail-product')
            ->with([
                'product' => $product
            ]);
    }
    public function updateProduct($id){
        $product = Products::where('id', $id)->first();
        return view('admin.products.update-product')
            ->with([
                'product' => $product
            ]);
    }
    public function updatePatchProduct($id, Request $req){
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
            'description' => $req->desc,

        ];
        Products::where('id', $id)->update($data);
        return redirect()->route('admin.product.listProducts')->with([
            'message' => 'Sửa thành công'
        ]);

    }
}
