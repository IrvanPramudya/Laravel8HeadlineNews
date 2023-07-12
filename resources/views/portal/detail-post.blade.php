@extends('portal.app')
@section('sc-css')
    <link rel="stylesheet" href="{{ url('assets/02-Single-post/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/02-Single-post/css/responsive.css') }}">
@endsection
@section('content')
    <div class="single-post">
        <div class="image-wrapper">
            <img src="{{ url('assets/images/blog-1-1000x600.jpg') }}" alt="Blog Image">
        </div>
        <div class="icons">
            <div class="left-area">
                <a href="#" class="btn caegory-btn"><b>{{ $posts->category->name }}</b></a>
            </div>
            <ul class="right-area social-icons">
                <li><a href="#"><i class="ion-android-textsms"></i>{{ count($data['comment']) }}</a></li>
            </ul>
        </div>
        <p class="date"><em>{{ date('D, M Y', strtotime($posts->created_at)) }}</em></p>
        <h3 class="title"><a href="#"><b class="light-color">{{ $posts->title }}</b></a></h3>
        {!! $posts->content !!}
    </div>
    <!--single-post-->
    <div class="post-author">
        <div class="author-image"><img src="{{ url($data['user']->image) }}" alt="{{ $data['user']->name }}"></div>
        <div class="author-info">
            <h4 class="name"><b class="light-color">{{ $data['user']->name }}</b></h4>
            {!! $data['user']->desc !!}
        </div>
        <!--author-info-->
    </div>
    <div class="comments-area">
        <h4 class="title"><b class="light-color">{{ count($data['comment']) }} Comments</b></h4>
        @foreach ($data['comment'] as $comment)
            <div class="comment">
                <div class="author-image">
                    <img src="{{ url('assets/images/author-2-150x150.png') }}" alt="Author Image">
                </div>
                <div class="comment-info">
                    <h5><b class="light-color">{{ $comment->name }}</b></h5>
                    <h6 class="date"><em>{{ date('D, M Y', strtotime($comment->created_at)) }}</em></h6>
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="leave-comment-area">
        <h4 class="title"><b class="light-color">Leave a Comment</b></h4>
        <div class="leave-comment">
            <form action="{{ url('comment') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $posts->id }}">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="name" placeholder="Name" class="name-input">
                    </div>
                    <div class="col-sm-6">
                        <input type="email" name="email" placeholder="Email" class="email-input">
                    </div>
                    <div class="col-sm-12">
                        <input type="subject" name="subject" placeholder="Subject" class="subject-input">
                    </div>
                    <div class="col-sm-12">
                        <textarea name="comment" placeholder="Message" class="message-input" rows="6"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-2" type="submit"><b>COMMENT</b></button>
                    </div>
                </div>
                <!--row-->
            </form>
        </div>
        <!--leave-comment-->
    </div>
    <!--comment-area-->
@endsection