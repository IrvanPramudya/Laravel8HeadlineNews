<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::get();
        return view('admin.comment.index', compact('data'));
    }
    public function insert(Request $request)
    {
        $request->validate(Comment::$rules);
        $requests = $request->all();
        $comment = Comment::create($requests);
        if ($comment) {
            return redirect('/post-detail/' . $request->post_id)->with('success', 'Berhasil Menambah Data !');
        }
        return redirect('/post-detail/' . $request->post_id)->with('success', 'Gagal Menambah Data !!!');
    }
}
