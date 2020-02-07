@extends('layouts.app')
@section('title', 'Write Reviews ' . config('app.name'))
@section('page_title', 'Write Reviews')

@section('content')
    <div class="welcome-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-text">Write Review</h2>
                        <form method="POST" action="{{ route('savereview') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <!-- Form Group -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-sx-12">
                                        <!-- Element -->
                                        <div class="element">
                                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Title *" >
                                        </div>
                                        <!-- End Element -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-sx-12">
                                        <!-- Element -->
                                        <div class="element">
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name *" required>
                                        </div>
                                        <!-- End Element -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-sx-12">
                                        <!-- Element -->
                                        <div class="element">
                                            <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="E-mail" required="">
                                        </div>
                                        <!-- End Element -->
                                    </div>
                                </div>
                            </div>
                            <!-- End form group -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <!-- Element -->
                                        <div class="element">
                                            <div>
                                                <!-- Element -->
                                                <div class="element">
                                                    <input type="file" class="form-control" placeholder="Image *" name="image">
                                                </div>
                                                <!-- End Element -->
                                            </div>
                                        </div>
                                        <!-- End Element -->
                                    </div>
                                    <!-- End form Group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <!-- Element -->
                                        <div class="element">
                                            <div>
                                                <!-- Element -->
                                                <div class="element">
                                                    <textarea name="review" class="form-control textarea" placeholder="Review *" rows="5" required>{{ old('review') }}</textarea>
                                                </div>
                                                <!-- End Element -->
                                            </div>
                                        </div>
                                        <!-- End Element -->
                                    </div>
                                  <!-- End form Group -->
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2">
                                        <img src="{{ route('captcha') }}" alt="Captcha">
                                </div>
                                <div class="col-md-10">
                                        <input type="text" class="form-control text {{ $errors->has('captcha') ? ' is-invalid' : '' }}" id="captcha" name="captcha" placeholder="Enter Captcha" required="">
                                        @if ($errors->has('captcha'))
                                        <span class="help-block text-danger"><strong>{{ $errors->first('captcha') }}</strong></span>
                                        @endif
                                </div>
                            </div>
                            <!-- Element -->
                            <br class="hidden-xs">
                            <div class="element">
                                <button type="submit" id="submit" value="Send" class="btn btn-black">Send</button>
                                <!-- <div class="loading"></div> -->
                            </div>
                            <!-- End Element -->
                        </form>

                </div>

                </div>
            </div>
    </div>
@endsection