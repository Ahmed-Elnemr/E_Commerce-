<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    function store(Request $request)
    {
        $data=$request->all();
        Category::create($data);
    }
}
