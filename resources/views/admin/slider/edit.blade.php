@extends('admin.app')
@section('content')
<h3>Edit Slider</h3>
<hr>
<div class="col-lg-12">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>    
    @endif
<div class="center">
    <form action="{{ url('admin/slider/edit/'.$data->id) }}" method="post" enctype="multipart/form-data">
        @csrf        
        <label for="Title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $data->title }}">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control"><br>
        <label for="category">Category</label>
        <select class="form-control" name="category_id" id="category">
            @foreach ($category as $cat)
                <option value="{{ $cat->id }}" {{ ($cat->id == $data->category_id)? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
        <label for="URL">URL</label>
        <input type="text" name="url" class="form-control" value="{{ $data->url }}"><br>
        <label for="Order">Order</label>
        <input type="number" name="order" class="form-control" value="{{ $data->order }}"><br>
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="1" {{ (0 == $data->status) ? 'selected' : '' }}>Publish</option>
            <option value="0" {{ (0 == $data->status) ? 'selected' : '' }}>Tidak Publish</option>
        </select><br>
        <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
        <a href="{{ url('admin/slider') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left">
        </i>Kembali</a>
    </form>
</div>
</div>
@endsection