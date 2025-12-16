@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($movie) ? 'Film szerkesztése' : 'Új film' }}</h1>

    <form method="POST" action="{{ isset($movie) ? route('movies.update', $movie['id']) : route('movies.store') }}">
        @csrf
        @if(isset($movie))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Cím</label>
            <input name="title" value="{{ old('title', $movie['title'] ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Rendező</label>
            <select name="director_id" class="form-select">
                <option value="">-- válassz --</option>
                @foreach($directors ?? [] as $d)
                    <option value="{{ $d['id'] }}" @selected(old('director_id', $movie['director_id'] ?? ($movie['director']['id'] ?? '')) == $d['id'])>
                        {{ $d['name'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Év</label>
            <input name="release_year" value="{{ old('release_year', $movie['release_year'] ?? '') }}" class="form-control">
        </div>

        <button class="btn btn-primary">Mentés</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Mégse</a>
    </form>
</div>
@endsection
