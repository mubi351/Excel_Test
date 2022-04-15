<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
class FrontendController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        
        return view('front-end.index',compact('blog'));
    }

    public function store(Request $request)
    {
        
        $comment = new Comment();
        $comment->blog_id = $request->blog_id;
        $comment->comments = $request->comment;
        $comment->save();
        $request->session()->flash('status','Comment sent successfully');
        return redirect('/');
    }
}
