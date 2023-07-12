<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.min.css') }}">
    @yield('css')
    <style>
        .link-menu{
            color: white;
        }
        .link-menu:hover{
            color: white;
            text-decoration: none;
        }
        .center {
        margin: auto;
        width: 60%;
        border: 5px solid #05daf7;
        padding: 10px;
        }

        }
    </style>
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('admin') }}">CMS BLOG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{ url('admin') }}">Home</a>
                        <a class="nav-link" href="{{ url('admin/category') }}">Category</a>
                        <a class="nav-link" href="{{ url('admin/slider') }}">Slider</a>
                        <a class="nav-link" href="{{ url('admin/post') }}">Post</a>
                        <a class="nav-link" href="{{ url('admin/mainmenu') }}">Main Menu</a>
                        <a class="nav-link" href="{{ url('admin/message') }}">Message</a>
                    </div>
                    <div class="my-2 my-lg-0">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <a href="{{ url('admin/profile/'.session('admin_id')) }}" class="link-menu">Profile</a>
                            </label>
                            <label class="btn btn-secondary active">
                                <a href="{{ url('logout') }}" class="link-menu">Log Out</a>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid mt-3">
            <div class="jumbotron">
                @yield('content')
            </div>
        </div>
        <footer class="footer navbar fixed-bottom bg-dark">
            <div class="container">
                <span class="text-muted">
                    Copyright @ 2021 BK UDINUS
                </span>
            </div>
        </footer>



        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
        @include('sweetalert::alert')
        @yield('js')
    </body>
</html>