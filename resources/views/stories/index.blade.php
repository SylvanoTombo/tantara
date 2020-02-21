@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($stories as $story)
            <div class="px-4 row">
                <div class="card border-primary mb-3" >
                  <div class="card-header"><span class="text-muted">Ecrit par </span> {{ $story->user->name }} </div>
                  <div class="card-body">
                    <h4 class="card-title">{{ $story->title }}</h4>
                    <p class="card-text">
                        {!! Str::words($story->body, 200) !!}
                    </p>
                    <a class="btn btn-secondary" href="{{ route('stories.show', ['story' => $story->id]) }}">Lire</a>
                  </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
