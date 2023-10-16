<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function CreateCategory()
    {
        $categories = Category::all();
        return view('user.create', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();

        return redirect()->route('home');
    }

    public function editCategory(Request $request, $id=null)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('user.edit', compact('category', 'categories'));
    }

    public function updateCategory(Request $request, $id=null)
    {
        $data = $request->all();

        Category::find($id)->update($data);
        return redirect()->route('home')->with('success', 'Category updated successfully');
    }

    public function deleteCategory(Category $category, $id=null)
    {
        Category::find($id)->delete();
        return redirect()->route('home');
    }
}
