@extends('frontend.layouts.app') 

@section('title', app_name() . ' ~ View') 

@section('content')
    <div class="card card-header-border">
        <div class="card-header">
            <span class="h6">Account Information</span>
        </div>
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <p class="card-text">Content</p>
        </div>
    </div>
@endsection