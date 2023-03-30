<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::search()->type(1)->get()->where('user_id', 2);
        $posts = Post::search()->paginate();
        return view('admin.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('post-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function clone (string $id)
    {
        $post = Post::findOrFail($id);
        $new_post = $post->replicate();
        $new_post->save();
        return redirect()->route('post-edit',$new_post);
    }

    public function update_mass ()
    {
        $post = Post::where('user_id', 1)->update(['user_id' => 2]);
        return redirect()->route('post-list')   ;
    }

    public function check_change ($id)
    {
        $post = Post::findOrFail($id);
        if ($post->wasChanged) {
            return "Dữ liệu đã được thay đổi";
        } else {
            return "Dữ liệu chưa được thay đổi";
        }
    }
}
