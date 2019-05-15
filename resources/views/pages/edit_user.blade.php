@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            @include('components.cover_panel')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            @include('components.left_panel')
        </div>
        <div class="col-sm-9 col-md-6">
            @include('components.messages')
            @include('components.edit_user')
        </div>
    </div>
@endsection
