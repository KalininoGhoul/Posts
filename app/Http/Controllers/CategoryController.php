<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }
    public function show(string $id)
    {
        $posts = Post::select( DB::raw('*, NOW() - updated_at as timePassed') )
            ->where('category_id', $id)->get()
            ->sortByDesc('order');

        $category = Category::find($id);

        return view('categories.show', compact('posts', 'id', 'category'));
    }
}
