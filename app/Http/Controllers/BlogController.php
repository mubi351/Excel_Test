<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('home',compact('blogs'));
    }

    public function store(Request $request)
    {
        $validateData= $request->validate([
            'Title' => ['required', 'string', 'max:50'],
            'Description' => ['required', 'string', 'max:255'],
        ]);

        $blog = new Blog();
        $blog->title = $request->Title;
        $blog->description = $request->Description;
        $blog->save();
        $request->session()->flash('status','Blog entered successfully');
        return redirect('home');    
        
    }

    public function delete(Request $request,$id)
    {

        $blog = Blog::FindOrFail($id);
        $blog->comments()->delete();
        $blog->delete();
        $request->session()->flash('status','Blog deleted successfully');
        return redirect('home');
    }

    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();

        return view('blog_edit', compact('blog'));
    }

    public function update(Request $request,$id)
    {
        $title = $request->Title;
        $desc = $request->Description;
        $blog = Blog::where('id',$id)->update(['title'=>$title,'description'=>$desc]);
        $request->session()->flash('status','Blog Updated Successfully');
        return redirect('home');
    }
}
