@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-3 col-md-3 col-md-offset-0">
            @include('components/left_panel')
        </div>
        <div class="col-sm-6 col-md-6 col-md-offset-0">
            @include('components/create_post_panel')
            @include('components/posts_list')
        </div>
        <div class="col-sm-3 col-md-3 col-md-offset-0">
            @include('components/right_panel')
        </div>
    </div>
@endsection
