<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::get();
        return view('admin.slider.index', compact('data'));
    }
    public function create()
    {
        $category = Category::all();
        return view('admin.slider.create', compact('category'));
    }
    public function insert(Request $request)
    {
        $request->validate(Slider::$rules);
        $requests = $request->all();
        $requests['image'] = "";
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/slider/", $files);
            $requests['image'] = "file/slider/" . $files;
        }
        $data = Slider::create($requests);
        if ($data) {
            return redirect('admin/slider')->with('success', 'Berhasil Menambah Data !');
        }
        return redirect('admin/slider')->with('success', 'Gagal Menambah Data !!!');
    }
    public function edit($id)
    {
        $data       = slider::find($id);
        $category   = Category::all($id);
        return view('admin.slider.edit', compact('data', 'category'));
    }
    public function update(Request $request, $id)
    {
        $d = Slider::find($id);
        if ($d == null) {
            return redirect('admin/slider')->with('success', 'Data Tidak Ditemukan !!');
        }
        $req = $request->all();

        if ($request->hasFile('image')) {
            if ($d->image !== null) {
                File::delete("$d->image");
            }
            $slider = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/slider/", $slider);
            $req['image'] = "file/slider/" . $slider;
        }
        $data = slider::find($id)->update($req);
        if ($data) {
            return redirect('admin/slider')->with('success', 'Slider Berhasil di Edit !');
        }
        return redirect('admin/slider')->with('success', 'Gagal Edit Slider !!!');
    }
    public function delete($id)
    {
        $data = slider::find($id);
        if ($data == null) {
            return redirect('admin/slider')->with('success', 'Data Tidak Ditemukan !!');
        }
        if ($data->image !== null || $data->image !== "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/slider')->with('success', 'Slider Berhasil di Hapus !');
        }
        return redirect('admin/slider')->with('success', 'Gagal Hapus Slider !!!');
    }
}
