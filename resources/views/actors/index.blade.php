@extends('layouts.app')

@section('content')
<h2>Színészek</h2>

<!-- Add New Actor gomb -->
<a href="{{ route('actors.create') }}">
    <button style="margin-bottom:20px; background-color:#28a745; color:white;">Új színész</button>
</a>

<div style="display:flex; flex-wrap:wrap; gap:20px;">
    @foreach($actors as $actor)
        <div style="flex:1 1 200px; background-color:#fff; padding:15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1); text-align:center;">

            <!-- Actor kép -->
            @php
                $actorImage = 'actors/actor_' . $actor->id . '.jpg';
            @endphp

            @if(Storage::disk('public')->exists($actorImage))
                <img src="{{ asset('storage/' . $actorImage) }}" alt="{{ $actor->name }}" style="width:100%; height:auto; border-radius:5px;">
            @else
                <div style="width:100%; height:150px; background-color:#ccc; display:flex; align-items:center; justify-content:center; border-radius:5px;">
                    Nincs kép
                </div>
            @endif

            <h3 style="margin:10px 0 5px 0;">{{ $actor->name }}</h3>
            <p style="font-size:14px; color:#666;">{{ $actor->gender ?? 'N/A' }}</p>
            <p style="font-size:14px; color:#666;">{{ $actor->birth_date ?? 'N/A' }}</p>

            <div style="margin-top:10px; display:flex; justify-content:center; gap:5px; flex-wrap: wrap;">
                <a href="{{ route('actors.edit', $actor) }}">
                    <button style="background-color:#007BFF; color:white;">Szerkesztés</button>
                </a>

                <form action="{{ route('actors.destroy', $actor) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background-color:#dc3545; color:white;">Törlés</button>
                </form>

                <a href="{{ route('actors.show', $actor) }}">
                    <button style="background-color:#17a2b8; color:white;">Megtekintés</button>
                </a>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination -->
<div style="margin-top:20px;">
    {{ $actors->links() }}
</div>
@endsection
