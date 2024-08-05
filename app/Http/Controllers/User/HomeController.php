<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function home(){
        $products = Products::orderBy('created_at', 'desc')->take(4)->get();
        $category = Category::get();
        return view('user.home')->with([
            'products' => $products,
            'category' => $category
        ]);
    }
    public function detailProduct($id){
        $product = Products::where('id', $id)->first();
        $category = Category::get();
        return view('User.detailproduct')->with([
            'product'   => $product,
            'category' => $category
        ]);
    }
    public function categoryProduct($id){
        $product = Products::where('category_id', $id)->get();
        $category = Category::get();
        $categoryId = Category::where('id', $id)->first();
        return view('User.listproduct')->with([
            'products'   => $product,
            'category' => $category,
            'categoryId' => $categoryId
        ]);
    }
}