@extends('layout')

@section('title') Create new post @endsection

@section('content')
    <h1 @class([ 'text-center', 'mt-2' ])>Create post</h1>
    <form action="{{ route('storePost') }}" method="POST">
        @csrf
        <input type="hidden" name="category_id" value="{{ $id }}">
        <div class="form-group">
            <label for="user">User name</label>
            <input type="text" class="form-control" id="user" aria-describedby="emailHelp" placeholder="User" name="user">
        </div>
        <div class="form-group mt-2">
            <label for="text">Text</label>
            <textarea class="form-control" id="text" placeholder="Text" name="text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

@endsection
