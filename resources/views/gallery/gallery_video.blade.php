@extends('layouts.app') 
@section('title') {{ $page->m_title }}
@endsection
 
@section('content')
<header class="masthead mb-5">
        <div class="overlay"></div>
       
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-12">
                    <div class="container text-md-left">
                        <h1 class="font-weight-normal text-white">Video Gallery</h1>
                        <span class="header_button_span"></span>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid mb-5">
        <div class="container">
            <div class="row">
                @if($videos)
                    @foreach($videos as $video)
                <div class="col-md-4">
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/{{$video->video_id}}" frameborder="0" allowfullscreen></iframe>
                </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    @endsection