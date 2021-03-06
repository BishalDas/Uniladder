@extends('admin.app')

@section('title')
Add Social Link
@endsection

@section('content')

<h1>Social Link <a href="{{ route('socials.index') }}" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> <span>Back</span></a></h1>

<hr>

<div class="content-form">
	<form class="form-horizontal" action="{{ route('socials.store') }}" accept-charset="utf-8" method="post">
		{!! csrf_field() !!}

		@include('admin.social.form')
		<div class="form-group">
			<label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-10"><input class="btn btn-success" name="submit" value="Save" type="submit" id="form_submit"></div>		
		</div>	
	</form>
</div>
@endsection