@extends('layouts.app') 
@section('title') {{ $page->m_title }}
@endsection
 
@section('content')

<div class="container">
	<div class="breadcrumbs-w3l">
		<span class="breadcrumbs">
			<a href="{{ route('_root_') }}">Home</a> |
			@if($page->parent)
			<a href="{{ $page->parent->url }}">{{ $page->parent->title }}</a> |
			@endif
			<span>{{ $page->title }}</span>
		</span>
	</div>
</div>
<!-- contact -->
<div class="w3ls-section banner-single">
	<div class="container">
		<h4 class="main-title">contact us</h4>
		<div class="about-inner-main">
			<div class="col-md-6 contact-left">
				<div class="agile-contact-top">
					<h4>address </h4>
					<p>{{ Label::ofValue('global:address') }}</p>
					<h4>email</h4>
					<p>{{ Label::ofValue('global:email') }}</p>
					<h4>phone</h4>
					<p>{{ Label::ofValue('global:tel_no') }}</p>
				</div>
				<div class="contact-bottom">
					{!! \App\Setting::ofValue('google_map') !!}
				</div>
			</div>
			<div class="col-md-6 w3layouts-reg-form contact-form-row-agileinfo">
				<h4 class="form-con-txt">send us a mail</h4>
				<form action="{{ route('contact') }}" method="post" class="banner_form contact-inner-form">
					{{csrf_field()}}
					<div class="contact-form-left contact-field1">
						<div class="sec-left {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="contact-form-text">Name</label>
							<input placeholder="your name " name="name" type="text">
							@if ($errors->has('name'))
				                <span class="help-block" style="color: black;">
				                    <strong>
				                        {{ $errors->first('name') }}
				                    </strong>
				                </span>
				            @endif
						</div>

						<div class="sec-left {{ $errors->has('phone') ? ' has-error' : '' }}">
							<label class="contact-form-text">Phone No.</label>
							<input placeholder="your phone " name="phone" type="text">
							@if ($errors->has('phone'))
				                <span class="help-block" style="color: black;">
				                    <strong>
				                        {{ $errors->first('phone') }}
				                    </strong>
				                </span>
				            @endif
						</div>

						<div class="sec-right {{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="contact-form-text">Email</label>
							<input placeholder="example@example.com " name="email" type="email">
							@if ($errors->has('email'))
				                <span class="help-block" style="color: black;">
				                    <strong>
				                        {{ $errors->first('email') }}
				                    </strong>
				                </span>
				            @endif
						</div>

						<div class="form-tx contact-field3 {{ $errors->has('message') ? ' has-error' : '' }}">
							<label class="contact-form-text">Message</label>
							<textarea placeholder="your message" name="message"></textarea>
							@if ($errors->has('message'))
				                <span class="help-block" style="color: black;">
				                    <strong>
				                        {{ $errors->first('message') }}
				                    </strong>
				                </span>
				            @endif
						</div>

						<div class="form-group row">
							<div class="col-md-3">
	                            <img src="{{ route('captcha') }}" alt="Captcha">
	                        </div>

                            <div class="col-md-9">
	                            <input type="text" class="contact-formw3ls form-control {{ $errors->has('captcha') ? ' is-invalid' : '' }}" id="captcha" name="captcha" placeholder="Enter Captcha">
	                        </div>
	                        @if ($errors->has('captcha'))
				                <span class="help-block" style="color: black;">
				                    <strong>
				                        {{ $errors->first('captcha') }}
				                    </strong>
				                </span>
				            @endif
                        </div>
					</div>


					<div class="contact-form-right contact-field2">
						<input type="submit" value="send message">
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection