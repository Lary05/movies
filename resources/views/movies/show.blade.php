@extends('layouts.app')

@section('content')
<h2>{{ $movie->title }}</h2>

<!-- Borítókép -->
@if($movie->cover_image)
    <div style="margin-bottom: 20px;">
        <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="Cover Image" style="max-width:300px; border-radius:8px;">
    </div>
@endif

<!-- Film adatok -->
<p><strong>Leírás:</strong> {{ $movie->description ?? 'No description available.' }}</p>
<p><strong>Rendező:</strong> {{ $movie->director->name }}</p>
<p><strong>Kategória:</strong> {{ $movie->category->name }}</p>

<!-- Színészek -->
<p><strong>Színészek:</strong>
    @if($movie->actors->count())
        @foreach($movie->actors as $actor)
            <a href="{{ route('actors.show', $actor) }}">{{ $actor->name }}</a>{{ !$loop->last ? ', ' : '' }}
        @endforeach
    @else
        Nincs hozzátartozó színész
    @endif
</p>

<!-- Akciógombok -->
<a href="{{ route('movies.edit', $movie) }}">
    <button>Szerkesztés</button>
</a>

<form action="{{ route('movies.destroy', $movie) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" style="background-color:#dc3545;">Törlés</button>
</form>

<a href="{{ route('movies.index') }}" style="margin-left:10px;">Vissza</a>
@endsection
