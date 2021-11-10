<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::get();
        if ($request->has('view_deleted')) {
            $posts = Post::onlyTrashed()->get();
        }
        return view('post', compact('posts'));
    }
    public function delete($id)
    {
        Post::find($id)->delete();
        return back()->with('success', 'Post Deleted Successfully');
    }

    public function restore($id)
    {
        Post::withTrashed()->find($id)->restore();
        return back()->with('success', 'Post Restore Successfully');
    }

    public function restore_all()
    {
        Post::onlyTrashed()->restore();
        return back()->with('success', 'All Post Restore Successfully');
    }
}
