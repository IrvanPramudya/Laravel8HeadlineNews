@extends('admin.app')
@section('content')
    <h3>Create Main Menu</h3>
    <hr>
    <div class="col-lg-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="center">
        <form action="{{ url('admin/mainmenu/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="Title">Title</label>
        <input type="text" name="title" class="form-control">
        <label for="Parent">Parent</label>
        <select name="parent" id="parent" class="form-control">
            <option value="0">-</option>
            @foreach ($parent as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
            @endforeach
        </select>
        <label for="Category">Category</label>
        <select name="category" id="category" class="form-control">
            <option>Select Category</option>
            <option value="link">Link</option>
            <option value="content">Content</option>
            <option value="file">File</option>
        </select>
        <div id="contents">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="10" cols="50"> </textarea>
        </div>
        <div id="files">
            <label for="file">File</label>
        <input type="file" id="file" name="file" class="form-control">
        </div>
        <div id="links">
            <label for="URL">URL</label>
        <input type="text" id="link" name="url" class="form-control">
        </div>
        <label for="Order">Order</label>
        <input type="number" name="order" class="form-control">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="1">Publish</option>
            <option value="0">Tidak Publish</option>
        </select>
        <br>
        <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
        <a href="{{ url('admin/mainmenu') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left">
        </i>Kembali</a>
        </form>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ url('assets/jquery/jquery.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#contents').hide();
        $('#links').hide();
        $('#files').hide();

        $('#category').on('change', function(){
            var data = $(this).val();
            $('#contents').hide();
            $('#links').hide();
            $('#files').hide();
            $('#'+data+'s').show();
        });
    });
</script>
<script src="{{ url('assets/ckeditor/ckeditor.js') }}"></script>
<script>
        var content = document.getElementById("content");
        CKEDITOR.replace(content,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
</script>
    
@endsection