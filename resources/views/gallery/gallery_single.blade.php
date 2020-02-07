@extends('layouts.app') 
@section('title') 
{{ $album->title }}
@endsection
 
@section('content')


<div class="container-fluid">
	<div class="container">
		<div class="row">
			 @foreach($album->photos as $photo)
                        <a class="col-sm-3" href="{{ asset('uploads/photo/' . $photo->image) }}" title="{{ $photo->caption }}">
                            <img src="{{ $photo->image('400x300') }}" alt="{{ $photo->caption }}" class="img-fluid img-thumbnail single_gallery_image">
                        </a>
                    @endforeach
		</div>
	</div>
</div>

@endsection