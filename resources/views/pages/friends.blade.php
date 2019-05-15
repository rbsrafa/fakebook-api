@extends('layouts.app')

@section('content')
    <div class="row">
        @include('components.cover_panel')
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 col-md-offset-0">
            @include('components.left_panel')
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            @include('components.friends_panel')
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 col-md-offset-0"></div>
    </div>
@endsection
