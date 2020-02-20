@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 >{{ $story->title }}</h2>
        <p class="text-secondary">Ecrit par <a href="#">Jacob</a> le 25 Decembre 2016</p>

        <p>{!! nl2br($story->body) !!}</p>
    </div>
@endsection
