<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::get();
        return view('admin.post.index', compact('data'));
    }
    public function create()
    {
        $category = Category::get();
        return view('admin.post.create', compact('category'));
    }
    public function insert(Request $request)
    {
        $request->validate(Post::$rules);
        $requests = $request->all();
        $requests['thumbnail'] = "";
        if ($request->hasFile('thumbnail')) {
            $files = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/post/", $files);
            $requests['thumbnail'] = "file/post/" . $files;
        }
        $cat = Post::create($requests);
        if ($cat) {
            return redirect('admin/post')->with('success', 'Berhasil Menambah Data !');
        }
        return redirect('admin/post')->with('success', 'Gagal Menambah Data !!!');
    }
    public function edit($id)
    {
        $data       = Post::find($id);
        $category   = Category::all();
        return view('admin.post.edit', compact('data', 'category'));
    }
    public function update(Request $request, $id)
    {
        $d = Post::find($id);
        if ($d == null) {
            return redirect('admin/post')->with('success', 'Data Tidak Ditemukan !!');
        }
        $req = $request->all();

        if ($request->hasFile('thumbnail')) {
            if ($d->thumbnail !== null) {
                File::delete("$d->thumbnail");
            }
            $post = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/post/", $post);
            $req['thumbnail'] = "file/post/" . $post;
        }
        $data = Post::find($id)->update($req);
        if ($data) {
            return redirect('admin/post')->with('success', 'Post Berhasil di Edit !');
        }
        return redirect('admin/post')->with('success', 'Gagal Edit Post !!!');
    }
    public function delete($id)
    {
        $data = Post::find($id);
        if ($data == null) {
            return redirect('admin/post')->with('success', 'Data Tidak Ditemukan !!');
        }
        if ($data->thumbnail !== null || $data->thumbnail !== "") {
            File::delete("$data->thumbnail");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/post')->with('success', 'Post Berhasil di Hapus !');
        }
        return redirect('admin/post')->with('success', 'Gagal Hapus Post !!!');
    }
}
