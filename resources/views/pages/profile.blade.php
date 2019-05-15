@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-md-offset-0">
            @include('/components/cover_panel')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 col-md-offset-0">
            @if(Auth::user()->id == $data['profile_id'])
                @include('/components/left_panel')
            @else
                @include('/components/users_panel')
            @endif
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-md-offset-0">
            @if(Auth::user()->id == $data['profile_id'])
                @include('/components/create_post_panel')
            @endif
            @include('/components/posts_list')
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 col-md-offset-0">
            @include('/components/right_panel')
        </div>
    </div>
@endsection
