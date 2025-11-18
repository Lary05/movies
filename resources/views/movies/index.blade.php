@extends('layouts.app')

@section('content')
<h2>Filmek</h2>

<!-- Add New Movie gomb -->
<a href="{{ route('movies.create') }}">
    <button style="margin-bottom:20px; background-color:#28a745; color:white;">Új film</button>
</a>

<!-- Filmek kártyákban -->
<div style="display: flex; flex-wrap: wrap; gap: 20px;">
    @foreach($movies as $movie)
        <div style="flex: 1 1 200px; background-color:#fff; padding:15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1); text-align:center;">
            
            <!-- Borítókép -->
            @if($movie->cover_image)
                <a href="{{ route('movies.show', $movie) }}">
                    <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}" style="width:100%; height:auto; border-radius:5px;">
                </a>
            @else
                <div style="width:100%; height:150px; background-color:#ccc; display:flex; align-items:center; justify-content:center; border-radius:5px;">
                    Nincs kép
                </div>
            @endif

            <!-- Film adatok -->
            <h3 style="margin:10px 0 5px 0;">
                <a href="{{ route('movies.show', $movie) }}" style="text-decoration:none; color:#333;">{{ $movie->title }}</a>
            </h3>
            <p style="font-size:14px; color:#666;">Rendező: {{ $movie->director->name }}</p>
            <p style="font-size:14px; color:#666;">Kategória: {{ $movie->category->name }}</p>

            <!-- CRUD gombok -->
            <div style="margin-top:10px; display:flex; justify-content:center; gap:5px; flex-wrap: wrap;">
                <a href="{{ route('movies.edit', $movie) }}">
                    <button style="background-color:#007BFF; color:white;">Szerkesztés</button>
                </a>

                <form action="{{ route('movies.destroy', $movie) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background-color:#dc3545; color:white;">Törlés</button>
                </form>

                <a href="{{ route('movies.show', $movie) }}">
                    <button style="background-color:#17a2b8; color:white;">Megtekintés</button>
                </a>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination -->
<div style="margin-top:20px;">
    {{ $movies->links() }}
</div>
@endsection
