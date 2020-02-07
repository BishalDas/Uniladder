@extends('layouts.app') 
@section('title') {{ $page->m_title }}
@endsection
 
@section('content')


<div class="container-fluid">
	<div class="container">
		<div class="row">
			@foreach($albums as $al)
			<div class="col-md-4">
				<img src="{{ $al->thumb }}"  class="img-fluid" height="200px" width="200px"><br>
				<a href="{{ route('viewalbum',$al->id) }}">{{$al->title}}</a>
			</div>

			@endforeach
		</div>
	</div>
</div>

@endsection