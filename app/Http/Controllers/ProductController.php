<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function index()
    {
        return view('admin.product.index', [
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    public function getSubCategoryByCategory()
    {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }
    public function manage()
    {
        return view('admin.product.manage', ['products' => Product::all()]);
        // return view('admin.product.manage', [
        //     'products' => Product::all(),
        //     'categories' => Category::all(),
        //     'subCategories' => SubCategory::all(),
        //     'brands' => Brand::all(),
        //     'units' => Unit::all(),]);
    }

    public function create(Request $request)
    {
        $this->product = Product::newProduct($request);
        OtherImage::newOtherImage($request->other_image, $this->product->id);
        return back()->with('message', 'Product added successfully');
    }

    public function edit($id)
    {

        return view('admin.product.edit', [
            'product' => Product::find($id),
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        if($request->other_image){
            OtherImage::updateOtherImage($request->other_image, $id);
        }
        return view('admin.product.detail', ['product' => Product::find($id)])->with('message', 'Product updated successfully');
    }
    public function delete($id)
    {
        Product::deleteProduct($id);
        OtherImage::deleteOtherImage($id);
        return redirect('/product/manage')->with('message', 'Product deleted successfully');
    }
    public function detail($id)
    {
        return view('admin.product.detail', ['product' => Product::find($id)]);
    }
}
