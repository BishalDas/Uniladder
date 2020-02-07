<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', config('app.name'))</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script>
        addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
    </script>
    <!-- //for-mobile-apps -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--banner slider  -->
    <link href="{{ asset('css/JiSlider.css') }}" rel="stylesheet">
    <!-- //banner-slider -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('vendors/owl/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('vendors/owl/assets/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}?ref={{str_random()}}" rel="stylesheet" type="text/css" media="all" />

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('images//ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139154512-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-139154512-1');
    </script>


</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

    <div class="cookie_message" id="cookie_message">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <p>We use cookies to make your experience better. To comply with the new e-Privacy directive, we need to
                        ask for your consent to set the cookies.</p>
                </div>
                <div class="col-sm-3">
                    <button id="cookie_yes" class="button button-secondary button-small">Yes I consent </button>
                    <a href="#" class="button button-plain button-small">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!--//footer  -->
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js-->
    <!--banner-slider-->
    <script src="js/JiSlider.js"></script>
    <script>
        $(window).load(function () {
			$('#JiSlider').JiSlider({
				color: '#fff',
				start: 1,
				reverse: false
			}).addClass('ff')
		})
    </script>
    <!-- //banner-slider -->
    <!--search-bar-->
    <script src="js/main.js"></script>
    <!--//search-bar-->
    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="vendors/owl/owl.carousel.min.js"></script>
    <script>
        $(function () {
			//cookies message
			$('#cookie_yes').on('click', function () {
				$.cookie('arcfacilities_cookie_message11', 'yes', {
					expiry: 0,
					domain: '',
					path: ''
				});
				$('#cookie_message').slideToggle('hide');
			});
			if (typeof $.cookie('arcfacilities_cookie_message11') == 'undefined') {
				$('#cookie_message').slideToggle('slow');
			}
		});
    </script>

    @yield('scripts')
</body>

</html>