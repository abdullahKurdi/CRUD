@extends('layouts.app')
@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success mb-2">Create Post</a>
@if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
@endif
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td><img src="{{asset('images/posts/'.$post->photo)}}" class="img-fluid" height="55px" width="55px" alt="Responsive image"></td>
            <td>{{$post->title}}</td>
            <td>{{$post->user ? $post->user->name:'user not found'}}</td>
            <td>{{$post->created_at->format('Y-m-d')}}</td>
            <td>
                <a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-primary">Edit</a>
                <form style="display: inline" method="post" action="{{route('posts.destroy',['post'=>$post->id])}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

