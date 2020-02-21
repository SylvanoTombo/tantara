@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 >{{ $story->title }}</h2>
        <p class="text-secondary">Ecrit par <a href="#">{{ $story->user->name }}</a> le {{ $story->created_at->format('j F Y') }}</p>

        <p>{!! nl2br($story->body) !!}</p>

        @auth()
            @if($story->user->id === auth()->user()->id)
                <a class="btn btn-secondary" href="{{ route('dashboard.stories.edit', ['story' => $story->id]) }}">Modifier</a>
            @endif
        @endauth
    </div>
@endsection
