@extends('layouts.app')
@section('title') {{ $page->m_title }}
@endsection

@section('content')

<!-- banner -->
<div class="banner-silder">
    <div id="JiSlider" class="jislider">
        <ul>
            @foreach($slides as $slide)
            <li>
                <div class="banner-top banner-top1" style="background:url('{{ asset('uploads/slide/' .  $slide->image) }}')">
                    <div class="container">
                        <div class="banner-info info2" >
                            <h3>{{ $slide->title }}</h3>
                            {!! $slide->details !!}
                        </div>
                    </div>
                </div>
            </li>
            @endforeach


        </ul>
    </div>
    <!-- welcome section -->
    <div class="welcome-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="heading-text">{{ Label::ofValue('home:welcome_title') }}</h2>
                    {!! $page->details !!}
                </div>
                {{--{{dd( App\Setting::ofValue('video'))}}--}}
                <div class="col-md-4">
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/{{ App\Setting::getVId()}}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- end of welcome section -->
    <!-- //banner -->
    <!-- banner bottom -->
    <div class="banner-btm">
        <div class="container">
            <div class="banner-bottom-main">
                <div class="col-md-4 banner-btmg1">

                    <div class="form-text">
                        <h3>Lokking for Abroad Study?</h3>
                        <p>Contact us for more information!</p>
                        {{-- <img src="images/f1.png" alt="" /> --}}
                    </div>
                    <form action="{{ route('inquiry') }}" method="post" class="banner_form">
                        {{ csrf_field() }}
                        <div class="sec-left">
                            <label class="contact-form-text">Name</label>
                            <input placeholder="Enter your name " name="name" type="text" required="">
                        </div>
                        <div class="sec-right">
                            <label class="contact-form-text">Email</label>
                            <input placeholder="Enter your name" name="email" type="email" required="">
                        </div>
                        <div class="sec-left">
                            <label class="contact-form-text">Mobile no.</label>
                            <input placeholder="Enter your phone" name="mobile_no" type="text" required="">
                        </div>
                        <div class="form-tx">
                            <label class="contact-form-text">Address</label>
                            <textarea placeholder="Enter your address" name="address" required=""></textarea>
                        </div>
                        <div class="form-select sec-right">
                            <label class="contact-form-text">Select Country</label>
                            <select name="country">
                                <option value="">---- SELECT ----</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-select sec-right">
                            <label class="contact-form-text">Select Services</label>
                            <select name="service">
                                <option value="">---- SELECT ----</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->title }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-tx">
                            <label class="contact-form-text">Message</label>
                            <textarea placeholder="Enter your Message" name="message" cols="4" required="" style="height:auto;"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ route('captcha') }}" alt="Captcha">
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control {{ $errors->has('captcha') ? ' is-invalid' : '' }}" id="captcha" name="captcha" placeholder="Enter Captcha">
                            </div>

                            @if ($errors->has('captcha'))
                                <span class="help-block" style="color: black;">
                                    <strong>
                                        {{ $errors->first('captcha') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="col-md-8 banner-btm-grid2">

                    <div class="col-md-4 banner-grid2">
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($services as $service)
                        <div class="banner-subg1">
                            <h3> {{ $service->title }}</h3>
                            <p>{{ str_limit(strip_tags($service->details), 180) }}</p>
                            <span class="fa fa-{{ config('services_icon.'. $service->id) }}" aria-hidden="true"></span>
                            <div class="read-btn">
                                <a href="{{ $service->url }}">view more</a>
                            </div>
                        </div>
                        @if($i==3)
                    </div>
                    <div class="col-md-4 banner-grid2">
                        @endif
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </div>

                    {{-- <div class="col-md-6 banner-grid2">
                        <div class="banner-subg1">
                            <h3>Study in USA</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit estibulum nibh urna scing nibh urna scing.
                            </p>
                            <span class="fa fa-yelp" aria-hidden="true"></span>
                            <div class="read-btn">
                                <a href="#">view more</a>
                            </div>
                        </div>
                        <div class="banner-subg1">
                            <h3>Study in UK</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit estibulum nibh urna scing nibh urna scing.
                            </p>
                            <span class="fa fa-gg" aria-hidden="true"></span>
                            <div class="read-btn">
                                <a href="#">view more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 banner-grid2">
                        <div class="banner-subg1">
                            <h3>Study in Canada</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit estibulum nibh urna scing nibh urna scing.
                            </p>
                            <span class="fa fa-yelp" aria-hidden="true"></span>
                            <div class="read-btn">
                                <a href="#">view more</a>
                            </div>
                        </div>
                        <div class="banner-subg1">
                            <h3>Study in Australia</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit estibulum nibh urna scing nibh urna scing.
                            </p>
                            <span class="fa fa-gg" aria-hidden="true"></span>
                            <div class="read-btn">
                                <a href="#">view more</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //banner bottom -->
    <!-- about -->
    <div class="agile-about-main">
        <div class="col-md-4 about-left">
            <div class="about-main-bg text-center">
                <h4 class="about-title">What</h4>
                <h4 class="sub">
                    <span>D</span>o <span>W</span>e
                    <span>D</span>o?</h4>
            </div>
        </div>
        <div class="col-md-8 about-bottom-g1">
            <h4>{{ Label::ofValue('home:why_choose_sub') }}</h4>
            <!-- <h4>get easy home repairs and upgrades with professional home service providers</h4> your complete home solution.-->
            <div class="about-grid">
                <div class="about-bottom-right">
                    <div class="abouthome-grid">
                        <span class="hi-icon hi-icon-archive fa fa-question"> </span>
                    </div>
                    <div class="about-bottom">
                        <h5>{{ Label::ofValue('home:admission_assistance') }}</h5>
                        <p>{{ Label::ofValue('home:admission_assistance_sub') }}</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="about-bottom-right">
                    <div class="abouthome-grid">
                        <span class="hi-icon hi-icon-archive  fa fa-tasks"> </span>
                    </div>
                    <div class="about-bottom">
                        <h5>{{ Label::ofValue('home:test_preparation') }}</h5>
                        <p>{{ Label::ofValue('home:test_preparation_sub') }}</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class=" about-bottom-right">
                    <div class="abouthome-grid">
                        <span class="hi-icon hi-icon-archive fa fa-graduation-cap"> </span>
                    </div>
                    <div class="about-bottom">
                        <h5>{{ Label::ofValue('home:career_counselling') }}</h5>
                        <p>{{ Label::ofValue('home:career_counselling_sub') }}</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class=" about-bottom-right">
                    <div class="abouthome-grid">
                        <span class="hi-icon hi-icon-archive fa fa-university"> </span>
                    </div>
                    <div class="about-bottom">
                        <h5>{{ Label::ofValue('home:scholarship') }}</h5>
                        <p>{{ Label::ofValue('home:scholarship_sub') }}</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="abt-img">
                {{-- <img src="images/a1.png" alt="" class="img-responsive" /> --}}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>



    @if(count($reviews)>0)
        <br>
    <div class="testimonial_container">

        <div class="container">
        <h2 class="heading-text" align="center">{{ Label::ofValue('home:review_title') }}</h2><br>
        <div class="testimonials_inner text-center" >
            <div class="owl-carousel owl-theme review_list">
                @foreach($reviews as $review)
                <div class="item testimonials_block">
                     <div class="testimonial_img" style="border-radius: 50%; overflow: hidden; width: 150px; margin: auto;">
                         {{--<img src="{{$review->image('300x300')}}" alt="image" width="150" height="150">--}}
                         @if(isset($review->image) && file_exists(public_path('/uploads/review/'.$review->image)))
                            <img src="{{$review->image('300x300') }}" alt="image" width="150" height="150">
                        @else
                            <img src="{{ asset('images/user.png') }}" width="150" height="150">
                        @endif
                    </div> 
                    <div class="testimonial_content">
                        <h4 style="padding-top: 10px; font-weight: bold">{{ $review->name }} {{ $review->country?$review->country->name:'' }}</h4>
                        <div class="testimonial_content_wrapper">
                            <p>{!! str_limit(strip_tags($review->details),120) !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    </div>
    @endif
</div>
<!-- //about -->
@endsection

@section('scripts')
<script>
    $(function () {
        $(document).ready(function(){
          $(".review_list").owlCarousel({
              items: 3,
              autoplay: true,
              responsive:{
                  0:{
                      items:1,
                  },
                  768:{
                      items:3,
                  }
              }
          });
        });
    });
</script>
@endsection