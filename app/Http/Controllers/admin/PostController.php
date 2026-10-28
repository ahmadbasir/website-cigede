<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view(
            'admin.posts.index',
            compact('posts')
        );
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $path = null;

        if($request->hasFile('image')){

            $path =
            $request->file('image')
                    ->store('posts','public');
        }

        Post::create([

            'title' => $request->title,

            'content' => $request->content,

            'image' => $path,

            'status' => $request->status

        ]);

        return redirect('/admin/posts')
        ->with(
            'success',
            'Artikel berhasil dibuat'
        );
    }
}