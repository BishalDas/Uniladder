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
                @if($page->child)
                <div class="row">
                    @foreach ($page->child as $child)
                        <div class="col-sm-4" style="margin-bottom:30px">
                            <a href="{{ route('study.place', $child->slug) }}" class="btn btn-primary btn-lg btn-block">{{ $child->title }}<i class="fa fa-external-link pull-right"></i></a>
                        </div>                        
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection