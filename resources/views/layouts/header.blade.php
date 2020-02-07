
<div class="header-top">
		<div class="container">
			<div class="col-md-8">
				<p style="font-size:12px;">{{ Label::ofValue('global:note')}}</p>
			</div>
			<div class="col-md-4">
				<div class="top-bar">
					@php
						$i=1;
						$menu_count = count($top_menu);
					@endphp
					@foreach ($top_menu as $menu)
					<a href="{{ $menu->url }}">{{ $menu->title }}</a> {{ $i <> $menu_count ? '|' : null }}
					@php
					$i++;
					@endphp
					@endforeach
				</div>

			</div>

		</div>
	</div>

	<div class="w3layouts-header">
		<div class="container">
			<div class="logo-nav-agileits">
				<div class="logo-nav-left">
					<h1>
						<a href="{{ route('_root_') }}">
							<img class="logo-item" src="images/logo.png" height="80" />
						</a>
					</h1>
				</div>

				<div class="header-grid-left-wthree top-icon hidden-xs">
					<div class="col-md-4">

							<div class="media">

								<div class="media-left" style="padding: 0;" >
									<div class="icon-left">
									<span class="left"><i class="fa fa-phone" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="media-body">
									<div class="right-info">
										<label class="title">Tel. No.:</label><br>{!!  nl2br(Label::ofValue('global:tel_no')) !!}
									</div>
								</div>
							</div>


						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4">
						<div class="media">
						<div class="media-left" style="padding: 0;" >

							<div class="icon-left">
							<span class="left"><i class="fa fa-mobile" aria-hidden="true"></i></span>
							</div>
						</div>
							<div class="media-body">
							<div class="right-info">
								<label class="title">Mobile No.:</label><br>{!! nl2br(Label::ofValue('global:mobile_no') ) !!}
							</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4">
						<div class="media">
							<div class="media-left" style="padding: 0;" >
							 <div class="icon-left">
								<span><i class="fa fa-envelope" aria-hidden="true"></i></span>
							 </div>
							</div>
							<div class="media-body">
							 <div class="right-info">
								<label class="title">Email:</label><br>{!! nl2br(Label::ofValue('global:email') ) !!} 							 </div>
							</div>
						</div>
					 <div class="clearfix"> </div>
					</div>
				</div>
				<!-- ----------mobile-version------------------ -->
					<div class=" top-icon hidden-lg hidden-md hidden-sm">
						<p class="text-center"><i class="fa fa-phone" aria-hidden="true"></i>   {{ Label::ofValue('global:tel_no') }} | <i class="fa fa-mobile" aria-hidden="true"></i>   {{ Label::ofValue('global:mobile_no') }}</p>
						<p class="text-center"><i class="fa fa-envelope" aria-hidden="true"></i>   {{ Label::ofValue('global:email') }}</p>
				
				<!-- 	<div class="col-md-4">
						<div class="icon-left">
							<i class="fa fa-mobile" aria-hidden="true"></i>   {{ Label::ofValue('global:mobile_no') }}
						</div>
					
						<div class="clearfix"> </div>
					</div> -->
					
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
	</div>
	<div class="menu">
		<div class="container">
			<div class="logo-nav-left1">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
                            @foreach ($main_menu as $link=>$menu)
                                @if (is_array($menu))

                                <li class="navigation dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $menu[$link] }}
                                        <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($menu['sub'] as $sub_link=>$sub_menu)
                                        <a class="dropdown-item" href="{{ $sub_link }}">{{ $sub_menu }}</a>
                                        @endforeach
                                    </div>
                                </li>
                                @else
	                                @if($menu == 'Home')
	                                	<li><a href="{{ $link }}">{{ $menu }}</a></li>
	                                @else
	                                	<li><a href="{{ $link }}">{{ $menu }}</a></li>
	                                @endif
                                @endif
                            @endforeach
							{{-- <li class="active">
								<a href="index.html">Home</a>
							</li>
							<li>
								<a href="about.html">about us</a>
							</li>
							<li class="navigation dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Repairs and Maintenance
								<span class="caret"></span>
								</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item scroll" href="#services">Plumbing </a>
										<a class="dropdown-item scroll" href="#pricings">Handy jobs</a>
										<a class="dropdown-item scroll" href="#clients">Carpentry</a>
										<a class="dropdown-item" href="#">Painting </a>
										<a class="dropdown-item" href="#">Mechanical and Electrical Engineering </a>
									</div>
							</li>
							<li class="navigation dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Building Services
								<span class="caret"></span>
								</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item scroll" href="#services">Cleaning services </a>
										<a class="dropdown-item scroll" href="#pricings">Space Management</a>
										<a class="dropdown-item scroll" href="#clients">House Arrangements</a>
										<a class="dropdown-item" href="about.html">Home move </a>
									</div>
							</li>
							<li class="navigation dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Catering
								<span class="caret"></span>
								</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item scroll" href="#services">Snacks </a>
										<a class="dropdown-item scroll" href="#pricings">Refreshments</a>
										<a class="dropdown-item scroll" href="#clients">Africaribbean </a>
										<a class="dropdown-item" href="about.html">English & Asian foods </a>
									</div>
							</li>
							<li class="navigation dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Management Consultancy
								<span class="caret"></span>
								</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item scroll" href="#services">Training </a>
										<a class="dropdown-item scroll" href="#pricings">Professional services</a>
										<a class="dropdown-item scroll" href="#clients">Project Management</a>
										<a class="dropdown-item scroll" href="#clients">Health and Safety</a>

									</div>
							</li>
							<li>
								<a href="contact.html">contact us</a>
							</li>

							<li class="s-bar">
								<div class="search-w3_agileits">
									<input class="search_box" type="checkbox" id="search_box">
									<label class="icon-search" for="search_box">
										<span class="fa fa-search" aria-hidden="true"></span>
									</label>
									<div class="search_form">
										<form action="#" method="post">
											<input type="search" name="Search" placeholder=" " />
											<input type="submit" value="Search">
										</form>
									</div>
								</div>
							</li> --}}
						</ul>
					</div>

				</nav>
			</div>
		</div>
	</div>
	<!-- //header -->