<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    private $key, $products;

    public function index()
    {
        return view('website.home.index', [
            'categories' => Category::all(),
            'products' => Product::orderBy('id','desc')->take('8')->get(['id','category_id','name','selling_price','image']),
        ]);
    }
    public function category($id)
    {
        return view('website.category.index',[
            'products' => Product::where('category_id',$id)->orderBy('id','desc')->get()
        ]);
    }
    public function detail($id)
    {
        return view('website.detail.index',['product' => Product::find($id)]);
    }

    public function ajaxSearch()
    {
        $this->key =$_GET['searchKey'];
        $this->products = Product::where('name', 'like', "%{$this->key}%")->get(['id', 'category_id', 'name', 'selling_price', 'image']);
        foreach($this->products as $product)
        {
            $product->image = asset($product->image);
            $product->category_name = $product->category->name;
        }
        return response()->json($this->products);
    }
}
