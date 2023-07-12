<?php

namespace App\Http\Controllers;

use App\Models\Mainmenu;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MainmenuController extends Controller
{
    public function index()
    {
        $data = Mainmenu::get();

        return view('admin.mainmenu.index', compact('data'));
    }
    public function create()
    {
        $parent = Post::all();
        return view('admin.mainmenu.create', compact('parent'));
    }
    public function insert(Request $request)
    {
        $request->validate(Mainmenu::$rules);
        $requests = $request->all();
        $requests['file'] = "";
        if ($request->hasFile('file')) {
            $files = Str::random("20") . "-" . $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/", $files);
            $requests['file'] = "file/mainmenu/" . $files;
        }
        $mm = Mainmenu::create($requests);
        if ($mm) {
            return redirect('admin/mainmenu')->with('success', 'Berhasil Menambah Data !');
        }
        return redirect('admin/mainmenu')->with('success', 'Gagal Menambah Data !!!');
    }
    public function edit($id)
    {
        $data       = Mainmenu::find($id);
        $parent     = Post::all();
        return view('admin.mainmenu.edit', compact('data', 'parent'));
    }
    public function update(Request $request, $id)
    {
        $d = Mainmenu::find($id);
        if ($d == null) {
            return redirect('admin/mainmenu')->with('success', 'Data Tidak Ditemukan !!');
        }
        $req = $request->all();

        if ($request->hasFile('file')) {
            if ($d->file !== null) {
                File::delete("$d->file");
            }
            $mainmenu = Str::random("20") . "-" . $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/", $mainmenu);
            $req['file'] = "file/mainmenu/" . $mainmenu;
        }
        $data = Mainmenu::find($id)->update($req);
        if ($data) {
            return redirect('admin/mainmenu')->with('success', 'mainmenu Berhasil di Edit !');
        }
        return redirect('admin/mainmenu')->with('success', 'Gagal Edit mainmenu !!!');
    }
    public function delete($id)
    {
        $data = mainmenu::find($id);
        if ($data == null) {
            return redirect('admin/mainmenu')->with('success', 'Data Tidak Ditemukan !!');
        }
        if ($data->file !== null || $data->file !== "") {
            File::delete("$data->file");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/mainmenu')->with('success', 'Data Berhasil di Hapus !');
        }
        return redirect('admin/mainmenu')->with('success', 'Gagal Hapus Data !!!');
    }
}
