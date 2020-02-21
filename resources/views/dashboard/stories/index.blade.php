@extends('layouts.dashboard', ['title' => 'Mes Tantaras'])

@section('content')
    @include('flashy::message')
    @if($stories->count() > 0)
        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Partagé</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($stories as $story)
                    <tr class="">
                        <td scope="row">{{ $story->title }}</td>
                        <td>{{ $story->shared ? 'Oui' : 'Non' }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-secondary" href="{{ route('stories.show', ['story' => $story->id]) }}">
                                Voir
                            </a>
                            <a class="ml-2 btn btn-outline-info" href="{{ route('dashboard.stories.edit', ['story' => $story->id]) }}">
                                Edit
                            </a>
                            <form class="ml-2" method="POST" action="{{ route('dashboard.stories.delete', ['story' => $story->id]) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-primary" href="#">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>
                Vous n'avez pas encore créer une Tantara.
                <a class="text-underline" href="{{ route('dashboard.stories.create') }}">Créer une.</a>
            </p>
        @endif
@endsection
