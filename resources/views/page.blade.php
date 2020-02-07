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
<!-- inner-banner-bottom -->
<div class="welcome-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-text">
                    {{ $page->title }}
                </h2>
                @if($page->image)
                    <img src="{{asset('uploads/page/'.$page->image)}}" alt="{{$page->title}}" width="400" class="img-responsive pull-right" style="margin-left: 20px;">
                @endif
                {!! $page->details !!}
            </div>


        </div>
    </div>
</div>
@endsection