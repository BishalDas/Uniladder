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
            <div class="col-md-3">
                <form action="#">
                    <div class="form-group">
                        <label class="control-label">Country</label>
                        <select name="country" id="country" class="form-control">
                            <option>All</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Location</label>
                        <select name="location" id="location" class="form-control">
                            <option>All</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="col-md-9">
                <div class="row">
                    @foreach($universities as $university)
                        <div class="col-md-4">
                            <div><img src=""></div>
                                {{ $university->title }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection