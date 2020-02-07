<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="fullscreen-bg">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/chartist/css/chartist-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('backdo0r/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('backdo0r/css/demo.css') }}">
</head>
<body>

<!-- WRAPPER -->
    <div id="wrapper" style="height:100%;">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="{{ asset('images/logo.png') }}" width="150" alt="{{ config('app.name') }}"></div>
                                <p class="lead">Login to your account</p>
                            </div>
                            <form class="form-auth-small" method="POST" action="{{ route('admin.login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    {{-- <input type="email" class="form-control" id="signin-email" value="samuel.gold@domain.com" placeholder="Email"> --}}
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    {{-- <input type="password" class="form-control" id="signin-password" value="thisisthepassword" placeholder="Password"> --}}
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div> --}}
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                {{-- <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                             <h1 class="heading">{{ config('app.name') }}</h1>
                            {{-- <img src="{{asset('images/1.jpg')}}" alt="{{ config('app.name') }}"> --}}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>
</html>
