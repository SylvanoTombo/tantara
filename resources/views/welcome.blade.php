@extends('layouts.app')

@section('content')
    <main role="main">
        <div class="container">
            <div class="jumbotron my-4">
                <h1 class="display-3">Bienvenu sur Tantara</h1>
                <p class="lead text-secondary">
                    Devenir un écrivain n'a jamais été aussi facile. Inscris toi pour commencer à écrire ton chef-d'oeuvre. <br> Partage tes écrits en quelques secondes et laisse nos lecteurs devenir des fans loyaux.
                </p>
                <p class="lead">
                    <a class="btn btn-primary" href="{{ route('login') }}" role="button">Creer un compte</a>
                </p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @if ($stories->count() > 0)
                    @foreach($stories as $story)
                        <div class="col-md-4 my-4">
                            <h2 class="h4">{{ $story->title }}</h2>
                            <p class="">{{  Illuminate\Support\Str::words($story->body, 20) }}</p>
                            <p>
                                <span class="text-secondary">
                                    Ecrit par:</span> {{ $story->user->name }} <span class="text-secondary">
                                    Le {{ $story->created_at->format('j F Y') }}
                                </span>
                            </p>
                            <p>
                                <a class="btn btn-secondary" href="{{ route('stories.show', ['story' => $story->id]) }}" role="button">
                                    Lire
                                </a>
                            </p>
                        </div>
                    @endforeach
                @else
                    <p>Aucune Tantara disponible? Vous pouvez créer un <a href="{{ route('dashboard.stories.create') }}">ici</a></p>
                @endif
            </div>
            <div class="d-flex justify-content-center">
                {{ $stories->links() }}
            </div>
            <hr>
        </div>
    </main>

@endsection
