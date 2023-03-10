<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function update(String $id)
    {
        $post = Post::find($id);

        $updated_at = $post->updated_at;
        $timePassed = time() - strtotime($updated_at);
        $hours = $timePassed / 3600;

        if ( $hours > 0.002 )
        {
            $maxOrder = Post::max('order');
            $order = $maxOrder + 1;

            $post->update( compact('order') );
        }

        return redirect()->route('category', $post->category_id);
    }

    public function create(String $id)
    {
        return view('categories.create', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => ['required', 'max:255'],
            'text' => ['required', 'max:1000'],
            'category_id' => ['required', 'integer'],
        ]);

        Post::create( $request->all() );

        return redirect()->route('category', $request->category_id)->with('success', 'Post created successfully');
    }
}
