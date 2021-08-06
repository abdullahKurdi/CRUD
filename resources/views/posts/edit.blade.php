@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('posts.update', ['post'=>$post->id])}}" enctype="multipart/form-data">
        @csrf{{--        // it's important for csrf attack--}}
        @method('PUT') {{--        // this method for put (edit route) route--}}
        <div class="form-group">
            <label for="exampleInputPhoto">photo</label>
            <input type="file" name="photo" class="form-control" id="exampleInputPhoto" >
            @error('photo')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->title}}">
            @error('title')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" value="{{$post->description}}">
            @error('description')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <label  for="inputGroupSelect01">Name Of The User</label>
        <select class="custom-select" id="inputGroupSelect01" name="user_id">
            @foreach($users as $user)
                <option selected>Choose...</option>
                <option value="{{$user->id}}" @if ($post->user_id == $user->id) selected  @endif>{{$user->name}}</option>
            @endforeach
        </select>
        @error('user_id')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
        <button type="submit" class="btn btn-success mt-2">Update Post</button>
    </form>
@endsection
