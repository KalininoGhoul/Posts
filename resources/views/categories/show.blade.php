@extends('layout')

@section('title') {{ $category->category }} @endsection

@section('content')

    <div @class([
        'container',
        'fixed-top',
        'bg-white',
        'd-flex',
        'align-items-center'
    ])>
        <h1>{{ $category->category }}</h1>
        <form action="{{ route('createPost', $id) }}" @class([ 'col', 'd-flex', 'justify-content-end', 'align-items-center' ])>
            @csrf
            <button>Create post</button>
        </form>
    </div>
    <div @class([ 'invisible' ])>
        <h1>{{ $category->category }}</h1>
    </div>

    @foreach ($posts as $post)
        <div @class([
            'row',
            'border-bottom' => !$loop->last,
        ])>
            <h2 @class([ 'col', 'mt-3', 'mb-4' ])>{{ $post->user }}</h2>


            @php
                $allowUp = $post->timePassed / 3600 > 24;
                if ($post->created_at == $post->updated_at) $allowUp = true;
            @endphp

            @if(!$loop->first
                && $allowUp)
                <form action="{{ route('upPost', $post->id) }}" @class([ 'col', 'd-flex', 'justify-content-end', 'align-items-center' ]) method="POST">
                    @csrf
                    @method('put')
                    <button>up post</button>
                </form>
                <br>
            @endif

            <p>{{ $post->text }}</p>
        </div>

    @endforeach

@endsection
