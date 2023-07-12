@extends('admin.app')
@section('content')
<h3 style="text-align: center">Edit Profile</h3>
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

    <form action="{{ url('admin/profile/'.$data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="center">
                    <h5 class="text-center">Foto Profil</h5>
                    <img src="{{ url($data->image) }}" class="rounded-circle mx-auto d-block"><br>
                    <input type="file" name="image" class="form-control" value="{{ $data->image }}"><br>
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                        <center>                
                <input type="submit" name="submit" class="btn btn-md btn-primary" value="Edit Data">
                <a href="{{ url('admin') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left">
                </i>Kembali</a>
            </center>
            </form>
        </div> 
</div>
@endsection