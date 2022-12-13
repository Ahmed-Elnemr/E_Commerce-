<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use Symfony\Component\HttpKernel\Attribute\Cache;

class CategoryController extends Controller
{
    function index()
    {

        return view('admin.category.index');
    }
    function create()
    {
        return view('admin.category.create');
    }

    //
    function store(CategoryFormRequest $request)
    {
        $validateData = $request->validated();
        $category = new Category;
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']);
        $category->description = $validateData['description'];

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/categorys/', $fileName);

            $category->image = $fileName;
        }
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->save();

        return
       redirect('admin/category')->with('message','Category Added Successfuly');
    }
}
