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
                <h2>{{ $page->title }}</h2>
                {!! $page->details !!}

                @if($page->child)
                <hr>
                <div class="row">
                    @foreach ($page->child as $child)
                    <div class="col-sm-4" style="margin-bottom:30px">
                        <h4>{{ $child->title }}</h4>
                        
                        <p>{{ str_limit(strip_tags($child->details), 100) }}</p>
                        <a href="{{ $child->url }}" class="btn btn-primary">Read More</a>
                    </div>                        
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection