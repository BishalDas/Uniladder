@extends('admin.app') 
@section('title') Dashboard
@endsection
 
@section('content')
    <div class="row">
        @foreach ($data as $dash)
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <span class="lnr lnr-{{$dash->icon}}" style="font-size: 100px"></span>
                </div>
                <div class="panel-footer">
                    <a href="{{ route($dash->route.'.index') }}">{{$dash->title}}<span class="badge pull-right">{{$dash->count}}</span></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection