@extends('layout')

@section('title') Categories @endsection

@section('content')
    <h1 @class([ 'text-center', 'mt-3', 'mb-5' ])>Categories</h1>
    @foreach ($categories as $category)
        <a href="{{ route('category', $category->id) }}" @class([ 'd-block', 'border', 'rounded-3', 'p-3', 'text-center', 'bg-primary', 'my-3' ])>
            <span @class([ 'text-decoration-none', 'text-white' ])>{{ $category->category }}</span>
        </a>
    @endforeach

@endsection
