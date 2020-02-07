<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'dashboard') - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/chartist/css/chartist-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('backdo0r/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('backdo0r/css/demo.css') }}">
</head>
<body>

    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="{{ route('admin.dashboard') }}">{{config('app.name')}}</a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                        <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                    </div>
                </form>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('settings.index') }}"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('') }}" class="img-circle" alt="Avatar"> <span></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="lnr lnr-exit"></i> <span>Logout</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="{{ route('admin.dashboard') }}" {!!(!request()->segment(2) ? 'class="active"' : null) !!} ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="{{ route('pages.index') }}" {!!(request()->segment(2) == 'pages' ? 'class="active"' : null) !!}><i class="lnr lnr-file-empty"></i> <span>Pages</span></a></li>
                        <li><a href="{{ route('slides.index') }}" {!!(request()->segment(2) == 'slides' ? 'class="active"' : null) !!}><i class="lnr lnr-picture"></i> <span>Slides</span></a></li>
                        <li><a href="{{ route('labels.index') }}" {!!(request()->segment(2) == 'labels' ? 'class="active"' : null) !!}><i class="lnr lnr-spell-check"></i> <span>Labels</span></a></li>
                        <li><a href="{{ route('reviews.index') }}" {!!(request()->segment(2) == 'reviews' ? 'class="active"' : null) !!}><i class="lnr lnr-bubble"></i> <span>Reviews</span></a></li>
                        {{-- <li><a href="{{ route('galleries.index') }}" {!!(request()->segment(2) == 'galleries' ? 'class="active"' : null) !!}><i class="lnr lnr-camera"></i> <span>Galleries</span></a></li> --}}
                        <li><a href="{{ route('socials.index') }}" {!!(request()->segment(2) == 'socials' ? 'class="active"' : null) !!}><i class="lnr lnr-link"></i> <span>Socials</span></a></li>
                        <li><a href="{{ route('admins.index') }}" {!!(request()->segment(2) == 'admins' ? 'class="active"' : null) !!}><i class="lnr lnr-user"></i> <span>Admins</span></a></li>
                        <li><a href="{{ route('contactinfos.index') }}" {!!(request()->segment(2) == 'contactinfos' ? 'class="active"' : null) !!}><i class="lnr lnr-spell-check"></i> <span>Contact Info</span></a></li>
                        <li><a href="{{ route('albums.index') }}" {!!(request()->segment(2) == 'contactinfos' ? 'class="active"' : null) !!}><i class="lnr lnr-picture"></i> <span>Photo Album</span></a></li>
                        <li><a href="{{ route('videos.index') }}" {!!(request()->segment(2) == 'contactinfos' ? 'class="active"' : null) !!}><i class="lnr lnr-picture"></i> <span>Video</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>
                            {{ Session::get('success') }}
                        </p>
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>
                            {{ Session::get(    'error') }}
                        </p>
                    </div>
                    @endif

                    <!-- OVERVIEW -->
                    @yield('content')
                    <!-- END OVERVIEW -->
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                {{-- <p class="copyright">&copy;  <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p> --}}
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->

    {{-- <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('admin') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <li><a href="{{ route('pages.index') }}">Pages</a></li>
                            <li><a href="{{ route('categories.index') }}">Categories</a></li>
                            <li><a href="{{ route('items.index') }}">Items</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>
                    {{ Session::get('success') }}
                </p>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>
                    {{ Session::get(    'error') }}
                </p>
            </div>
            @endif
            @yield('content')
        </div>
    </div> --}}

    <!-- Scripts -->
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('vendors/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('backdo0r/scripts/klorofil-common.js') }}"></script>
    {{-- <script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> --}}
    <script src="{{ asset('/vendors/ckeditor/ckeditor.js?ref_' . str_random()) }}"></script>
    <script>
        CKEDITOR.replace('details', {
            height: 500,
            extraPlugins: 'autoembed,embed,image2',
            embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
            // embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&responseType=json&_token=' +
                '{{ csrf_token() }}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&responseType=json&_token=' + '{{ csrf_token() }}'
        });
    </script>
    @yield('script')
</body>
</html>
