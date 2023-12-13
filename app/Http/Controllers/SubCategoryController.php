<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index', ['categories' => Category::all()]);
    }
    public function manage()
    {
        return view('admin.sub-category.manage', ['subCategories' => SubCategory::all()]);
    }

    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);

        return back()->with('message', 'Sub category added successfully');
    }

    public function edit($id)
    {

        return view('admin.sub-category.edit', [
            'categories' => Category::all(),
            'subCategory' => SubCategory::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category/manage')->with('message', 'Sub category updated successfully');
    }
    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/sub-category/manage')->with('message', 'Sub category deleted successfully');
    }
}
