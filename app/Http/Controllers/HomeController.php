<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($parentCategory = null)
    {
            $users = User::all();
            $categories = Category::where('parent_id')->with('children')->get();
            $parent_id = null;

            return view('admin.dashboard', compact('users', 'categories', 'parent_id'));

    }

}
