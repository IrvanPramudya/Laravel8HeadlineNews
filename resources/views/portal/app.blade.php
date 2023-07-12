<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog UDINUS</title>

    {{-- font --}}
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    {{-- Stylesheets   --}}
    <link rel="stylesheet" href="{{ url('assets/common-css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/common-css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/common-css/layerslider.css') }}">
    @yield('sc-css')
</head>
<body>
    <header>
        {{-- image --}}
        <div class="middle-menu center-text">
            <a href="#" class="logo">
                <img src="{{ url('assets/images/logo.jpg') }}" alt="Logo Image">
            </a>
        </div>
        <div class="bottom-area">
            <div class="menu-nav-icon" data-nav-menu="#mainmenu">
                <i class="ion-navicon"></i>
            </div>
            <ul class="main-menu visible-on-click" id="main-menu">
                @php
                    $data['mainmenu']       = DB::table('mainmenu')->where('status', 1)
                    ->where('parent', 0)->orderBy('order','asc')->get();
                @endphp
                @foreach ($data['mainmenu'] as $menu)
                    @php
                        $data['mainmenu2']  = DB::table('mainmenu')->where('status', 1)
                    ->where('parent', $menu->id)->orderBy('order','asc')->get();
                    @endphp
                    @if (count($data['mainmenu2'])>0)
                        <li class="drop-down">
                            <a href="#!">
                                Categories
                                <i class="ion-ios-arrow-down"></i>
                            </a>
                            <ul class="drop-down-menu">
                                @foreach ($data['mainmenu2'] as $menu2)
                                    @if ($menu2->category == 'link')
                                        <li><a href="{{ url($menu2->url) }}">{{ $menu2->title }}</a></li>                                        
                                    @else
                                        <li><a href="{{ url('menu/'.$menu2->id) }}">{{ $menu2->title }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        @else
                        @if ($menu->category == 'link')
                            <li><a href="{{ url($menu->url) }}">{{ $menu->title }}</a></li>                                        
                        @else
                            <li><a href="{{ url('menu/'.$menu->id) }}">{{ $menu->title }}</a></li>
                        @endif
                    @endif
                @endforeach
            </ul> <!--mainmenu -->
        </div><!--container -->
    </header>

    @yield('slider')
    <section class="section blog-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-posts">
                        @yield('content')
                    </div><!--blog posts -->
                </div><!--col-lg-4 -->

                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-area">
                        <div class="sidebar-section src-area">
                            <form action="{{ url('search') }}" method="GET">
                                <input type="text" name="search" placeholder="Search" class="src-input">
                                <button class="src-btn" type="submit"><i class="ion-ios-search-strong">
                                    </i></button>
                            </form>
                        </div>
                        <!--sidebar-section src-area -->

                        <div class="sidebar-section about-author center-text">
                            <div class="author-image">
                                <img src="{{ url($data['user']->image) }}" 
                                alt="{{ $data['user']->name }}">
                            </div>
                            <hr>

                            <h4 class="author-name"><b class="light-color">
                                {{ $data['user']->name }}
                            </b></h4>
                            {!! $data['user']->desc !!}
                            {{-- <div class="signature-image"><img src="assets/image/signature-image.png" 
                                alt="Signature Image"></div> --}}
                        </div><!--Sidebar-section About-author -->
                        <div class="sidebar-section category-area">
                            <h4 class="title">
                                <b class="light-color">Categories</b>
                            </h4>
                            @foreach ($data['category'] as $category)
                                <a href="{{ url('category/'.$category->id) }}" class="category">
                                    <img src="{{ url($category->image) }}" alt="{{ $category->name }}">
                                    <h6 class="name">{{ $category->name }}</h6>
                                </a>
                            @endforeach
                        </div><!--Sidebar-section category-area -->
                        <div class="sidebar-section latest-post-area">
                            <h4 class="title">
                                <b class="light-color">
                                    Latest Posts
                                </b>
                            </h4>
                            @foreach ($data['latestposts'] as $posts)
                                <div class="latest-post" href="{{ url('post-detail/'.$posts->id) }}">
                                    <div class="1-post-image">
                                        <img src="{{ url($posts->thumbnail) }}" alt="Category Image">
                                    </div>
                                    <div class="post-info">
                                        <a href="{{ url('category/' .$posts->category->id) }}" class="btn category-btn">{{ $posts->category->name }}</a>
                                        <h5><a href="{{ url('post-detail/'. $posts->id) }}"><b class="light-color">
                                        </b></a></h5>
                                        <h6 class="date"><em>{{ date('D, M Y', strtotime($posts->created_at)) }}
                                        </em></h6>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--sidebar-section latest-post-area -->
                        <div class="sidebar-section tags-area">
                            <h4 class="title"><b class="light-color">Tags</b></h4>
                            <ul class="tags">
                                @foreach ($data['category'] as $category)
                                    <li><a href="{{ url('category/'.$category->id) }}" class="btn">
                                    {{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div><!--Sidebar-section tags-area -->
                    </div><!--about-author -->
                </div><!--col-lg-4 -->
            </div><!--row -->
        </div><!--container -->
    </section><!--section -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="footer-section">
                        <p class="copyright">
                            Bimbingan Karir | &copy; 2022. All Rights Reserved
                        </p>
                    </div><!--footer-secction -->
                </div><!--col-lg-4 col-md-6 -->
            </div><!--row -->
        </div><!--container -->
    </footer>

    <!--SCRIPTS -->
    <script src="{{ url('assets/common-js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ url('assets/common-js/tether.min.js') }}"></script>
    <script src="{{ url('assets/common-js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/common-js/layerslider.js') }}"></script>
    <script src="{{ url('assets/common-js/scripts.js') }}"></script>
</body>
</html>