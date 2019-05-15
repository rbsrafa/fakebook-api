@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        @include('components.left_panel')
    </div>
    <div class="col-md-6">
        @include('components.edit_post_panel')
    </div>
    <div class="col-md-3">

    </div>
@endsection
