@extends('layouts.dashboard', ['title' => 'Modifier ' . $story->title])

@section('content')
    <form method="POST" action="{{ route('dashboard.stories.update', ['story' => $story->id]) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') ?? $story->title }}" >
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Corps</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10">{{ old('body') ?? $story->body }}</textarea>
            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-control custom-switch form-check-inline">
                <input type="checkbox" class="custom-control-input" id="share"
                    @if(old('shared'))
                        checked
                    @elseif($story->shared)
                        checked
                    @endif
                    name="share">
                <label class="custom-control-label" for="share">Partager ?</label>
                <small class="text-muted">Quand vous partager un tantara, il pourra être vu par tout le monde</small>
            </div>
        </div>
        <button type="submit" class="mt-4 btn btn-primary">Mettre à jour</button>
    </form>
@endsection
