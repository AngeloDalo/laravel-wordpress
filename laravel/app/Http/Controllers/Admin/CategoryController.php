<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(20);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }
}
