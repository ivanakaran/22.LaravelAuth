<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'Approved')->orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        $users = User::all();
        $comments = Comment::all();
        return view('posts', compact('posts', 'categories', 'users', 'comments'));
    }
}