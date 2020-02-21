@extends('layouts.dashboard', ['title' => 'Ecrire un Tantara'])

@section('content')
    <form method="POST" action="{{ route('dashboard.stories.store') }}">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                value="{{ old('title') }}" placeholder="Trimo be">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Corps</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10" placeholder="Indray andro hono">{{ old('body') }}</textarea>
            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-control custom-switch form-check-inline">
                <input type="checkbox" name="share" class="custom-control-input" id="share" {{ old('shared') ? 'checked' : '' }}>
                <label class="custom-control-label" for="share">Partager ?</label>
                <small class="text-muted">Quand vous partager un tantara, il pourra être vu par tout le monde</small>
            </div>
        </div>
        <button type="submit" class="mt-4 btn btn-primary">Créer</button>
    </form>
@endsection
