@extends('admin.app')
@section('content')

<h3>Mainmenu</h3>
<hr>
@if(Session::has('status'))
<div class="alert alert-warning" role="alert">
    {{ Session::get('status') }}
</div>
@endif
<a href="{{ url('admin/mainmenu/create') }}" class="btn btn-md btn-primary mb-3">
<i class="fas fa-plus"></i>Tambah Data</a>
<table class="table table-bordered">
    <thead class="bg-primary text-light">
        <tr>
            <th>Title</th>
            <th>Parent</th>
            <th>Kategori</th>
            <th>Konten</th>
            <th>File</th>
            <th>URL</th>
            <th>Order</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach($data as $dat)
    <tr>
        <td>{{ $dat->title }}</td>
        <td>{{ $dat->parent }}</td>
        <td>{{ $dat->category }}</td>
        <td style="width: 20%;text-align: justify">{{ $dat->content }}</td>
        @if ($dat->file == true)
            <td align="center"><img width="100px" src="{{ url($dat->file) }}"></td>
        @else
            <td align="center">TIdak Ada Gambar</td>
        @endif
        <td style="width: 20%;text-align: justify">{{ $dat->url }}</td>
        <td>{{ $dat->order }}</td>
        @if ($dat->status == 0)
            <td>Tidak Publish</td>
        @else
            <td>Publish</td>
        @endif
        <td>
            <a href="{{ url('admin/mainmenu/edit/'.$dat->id) }}" class="btn btn-primary btn-md"><i class="fas fa-edit">
            </i>Edit</a>
            <a href="{{ url('admin/mainmenu/delete/'.$dat->id) }}" class="btn btn-warning btn-md"><i class=" fas fa-trash">
            </i>Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection