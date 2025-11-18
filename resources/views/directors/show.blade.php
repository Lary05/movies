@extends('layouts.app')

@section('content')
<h2>{{ $director->name }}</h2>

@if($director->image)
    <img src="{{ asset('storage/' . $director->image) }}" alt="{{ $director->name }}" style="width:200px;margin-bottom:15px;border-radius:5px;">
@endif

<a href="{{ route('directors.index') }}" style="display:inline-block;margin-top:10px;">← Vissza</a>
@endsection
