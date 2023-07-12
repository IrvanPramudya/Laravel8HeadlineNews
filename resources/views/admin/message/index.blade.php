@extends('admin.app')
@section('content')

<h3>Message</h3>
<hr>
@if(Session::has('status'))
<div class="alert alert-warning" role="alert">
    {{ Session::get('status') }}
</div>
@endif
<table class="table table-bordered">
    <thead class="bg-primary text-light">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
    </thead>
    @foreach($data as $msg)
    <tr>
        <td>{{ $msg->name }}</td>
        <td>{{ $msg->email }}</td>
        <td>{{ $msg->subject }}</td>
        <td>{{ $msg->message }}</td>
    </tr>
    @endforeach
</table>
@endsection