@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $movie['title'] ?? '—' }}</h1>
    <p><strong>Rendező:</strong> {{ $movie['director']['name'] ?? '—' }}</p>
    <p><strong>Év:</strong> {{ $movie['release_year'] ?? '—' }}</p>
    <p>{{ $movie['description'] ?? '' }}</p>
    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Vissza</a>
</div>
@endsection
