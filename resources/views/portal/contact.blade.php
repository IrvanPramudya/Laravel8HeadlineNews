@extends('portal.app')
@section('sc-css')
    <link rel="stylesheet" href="{{ url('assets/02-Single-post/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/02-Single-post/css/responsive.css') }}">
@endsection

@section('content')
    <div class="single-post">
        <div class="image-wrapper">
            <img src="{{ url('assets/images/blog-8-1000x600.jpg') }}" alt="Blog Image">
        </div>
        <h3 class="title"><b class="light-color">Contact Me</b></h3>
        <p class="desc">Jika Mengalami masalah saat mengakses website, 
        ada kekeliruan dalam isi konten atau memiliki kritik dan saran harap 
        Kontak kami segera, Terimakasih</p>
    </div>
    <!--single-post-->

    <div class="leave-comment-area">
        <h4 class="title"><b class="light-color">Leave a Comment</b></h4>
        <div class="leave-comment">
            <form action="{{ url('contact') }}" method="POST">
                @csrf
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