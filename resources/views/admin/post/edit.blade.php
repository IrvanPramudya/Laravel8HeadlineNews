@extends('admin.app')
@section('content')
<h3>Edit Posts</h3>
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
    <form action="{{ url('admin/post/edit/'. $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Title</label>
        <input type="text" value="{{ $data->title }}" name="title" class="form-control">

        <label for="thumbnail">Thumbnail</label>
        <input type="file" name="thumbnail" class="form-control"><br>

        <label for="category">Category</label>
        <select class="form-control" name="category_id" id="category">

            @foreach ($category as $cat)
                <option value="{{ $cat->id }}" {{ ($cat->id == $data->category_id)? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>

        <label for="headline">Headline</label>
        <select name="is_headline" id="is_headline" class="form-control">
            <option value="0" {{ (0 == $data->is_headline) ? 'selected' : '' }}>Tidak Headline</option>
            <option value="1" {{ (1 == $data->is_headline) ? 'selected' : '' }}>Headline</option>
        </select>

        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="1" {{ (0 == $data->status) ? 'selected' : '' }}>Publish</option>
            <option value="0" {{ (0 == $data->status) ? 'selected' : '' }}>Tidak Publish</option>
        </select>
        <br>
        <textarea  id="content" class="form-control" name="content" cols="10" rows="50">
        {{ $data->content }}</textarea><br>

        <input type="submit" name="submit" class="btn btn-md btn-primary" value="Edit Data">
        <a href="{{ url('admin/post') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left">
            </i>Kembali</a>
    </form>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ url('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var content = document.getElementById("content");
        CKEDITOR.replace(content,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection