<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

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
    function store(CategoryFormRequest $request)
    {
        $validateData = $request->validated();
        $validateData=$request->all();
        Category::create($validateData);
    }
}
