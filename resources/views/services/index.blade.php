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
                <div class="col-md-12 banner-btm-grid2">
                    <div class="col-md-6 banner-grid2">
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($services as $service)
                        <div class="banner-subg1">
                            <h3> {{ $service->title }}</h3>
                            <p>{{ str_limit(strip_tags($service->details), 180) }}</p>
                            <span class="fa fa-yelp" aria-hidden="true"></span>
                            <div class="read-btn">
                                <a href="{{ $service->url }}">view more</a>
                            </div>
                        </div>
                        @if($i==2)
                    </div>
                    <div class="col-md-4 banner-grid2">
                        @endif
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection