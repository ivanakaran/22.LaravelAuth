<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'Not approved')->get();
        $categories = Category::all();

        return view('admins.index', compact('posts', 'categories'));
    }

    public function update($id)
    {
        $post = Post::find($id);
        $post->status = 'Approved';
        $post->save();

        return redirect()->route('admin');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect(route('admin'))->with('status', 'Succesfully Deleted');
    }

}