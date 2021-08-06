@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Post Information
    </div>
    <div class="card-body">
        <div class="mb-2">
        <img src="{{asset('images/posts/'.$post->photo)}}" class="img-fluid" height="300px" width="300px" alt="Responsive image">
        </div>
        <h5 class="card-title">Title</h5>
        <p class="card-text">{{$post->title}}</p>
        <h5 class="card-title">Description</h5>
        <p class="card-text">{{$post->description}}</p>
    </div>
</div>
@endsection
