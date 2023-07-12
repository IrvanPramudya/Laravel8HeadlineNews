<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style type="text/css">
            body{
                background: #18ffff;
            }
        </style>
</head>
<body>
    <div class="container mt-5 p-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <img src="assets/images/bg-register.jpg" alt="" class="card-img-top">
                    </div>

                    <div class="col-lg-5">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session::has('status'))
                            <div class="alert alert-warning" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <form action="{{ url('login') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Form Login</h3>
                        <hr>
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <div class="mt-3">
                        <input type="submit" name="submit" class="btn btn-md btn-primary" value="Login">
                        <a href="register" class="btn btn-warning">Register</a>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>