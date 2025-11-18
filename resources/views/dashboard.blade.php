@extends('layouts.app')

@section('content')
<h2>Adatkezelő</h2>

<!-- Statisztikák kártyákban -->
<div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 30px;">
    <div style="flex: 1 1 200px; padding: 20px; background-color: #007BFF; color: white; border-radius: 8px; text-align:center;">
        <h3>Összes film</h3>
        <p style="font-size: 24px;">{{ $totalMovies }}</p>
    </div>

    <div style="flex: 1 1 200px; padding: 20px; background-color: #28a745; color: white; border-radius: 8px; text-align:center;">
        <h3>Összes rendező</h3>
        <p style="font-size: 24px;">{{ $totalDirectors }}</p>
    </div>

    <div style="flex: 1 1 200px; padding: 20px; background-color: #ffc107; color: white; border-radius: 8px; text-align:center;">
        <h3>Összes kategória</h3>
        <p style="font-size: 24px;">{{ $totalCategories }}</p>
    </div>

    <div style="flex: 1 1 200px; padding: 20px; background-color: #17a2b8; color: white; border-radius: 8px; text-align:center;">
        <h3>Összes színész</h3>
        <p style="font-size: 24px;">{{ $totalActors }}</p>
    </div>
</div>

<!-- Quick links -->
<h3>Gyors elérés</h3>
<div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 30px;">
    <a href="{{ route('movies.index') }}" style="flex: 1 1 150px; padding: 15px; background-color: #007BFF; color: white; border-radius: 8px; text-align:center;">Filmek</a>
    <a href="{{ route('movies.create') }}" style="flex: 1 1 150px; padding: 15px; background-color: #28a745; color: white; border-radius: 8px; text-align:center;">Új film</a>
    <a href="{{ route('directors.index') }}" style="flex: 1 1 150px; padding: 15px; background-color: #ffc107; color: white; border-radius: 8px; text-align:center;">Rendezők</a>
    <a href="{{ route('actors.index') }}" style="flex: 1 1 150px; padding: 15px; background-color: #17a2b8; color: white; border-radius: 8px; text-align:center;">Színészek</a>
    <a href="{{ route('actors.create') }}" style="flex: 1 1 150px; padding: 15px; background-color: #dc3545; color: white; border-radius: 8px; text-align:center;">Új színész</a>
</div>

<!-- Legújabb filmek mini galéria -->
<h3>Filmek</h3>
<div style="display: flex; flex-wrap: wrap; gap: 20px;">
    @foreach($latestMovies as $movie)
        <div style="flex: 1 1 150px; background-color: #fff; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align:center;">
            @if($movie->cover_image)
                <a href="{{ route('movies.show', $movie) }}">
                    <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}" style="width:100%; height:auto; border-radius:5px;">
                </a>
            @else
                <div style="width:100%; height: 120px; background-color: #ccc; display:flex; align-items:center; justify-content:center; border-radius:5px;">
                    No Image
                </div>
            @endif
            <p style="margin-top:5px; font-weight:bold;">
                <a href="{{ route('movies.show', $movie) }}" style="text-decoration:none; color:#333;">{{ $movie->title }}</a>
            </p>
        </div>
    @endforeach
</div>
@endsection
