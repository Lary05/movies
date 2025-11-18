@extends('layouts.app')

@section('content')
<h2>{{ $actor->name }}</h2>

<p><strong>Leírás:</strong> {{ $actor->description }}</p>
<p><strong>Születési dátum:</strong> {{ $actor->birth_date }}</p>
<p><strong>Nem:</strong> {{ $actor->gender }}</p>

@php
    $actorImage = 'actors/actor_' . $actor->id . '.jpg';
@endphp

@if(Storage::disk('public')->exists($actorImage))
    <p><strong>Kép:</strong></p>
    <img src="{{ asset('storage/' . $actorImage) }}" alt="{{ $actor->name }}" style="max-width:300px; height:auto; border-radius:5px;">
@endif

<a href="{{ route('actors.edit', $actor) }}">Szerkesztés</a>
<a href="{{ route('actors.index') }}">Vissza</a>
@endsection
