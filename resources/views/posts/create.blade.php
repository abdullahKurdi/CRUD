@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputPhoto">photo</label>
            <input type="file" name="photo" class="form-control" id="exampleInputPhoto" >
            @error('photo')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter title">
            @error('title')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputDescription" placeholder="description">
            @error('description')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <label  for="inputGroupSelect01">Name Of The User</label>
        <select class="custom-select" id="inputGroupSelect01" name="user_id">
            <option selected>Choose...</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        @error('user_id')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
        <button type="submit" class="btn btn-primary mt-2">Create Post</button>
    </form>
@endsection
