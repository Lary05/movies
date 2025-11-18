@extends('layouts.app')

@section('content')
<h2>Szerkesztés</h2>

@if ($errors->any())
    <div style="color:red;margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('directors.update', $director) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div style="margin-bottom:15px;">
        <label for="name">Név:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $director->name) }}" required style="width:100%;padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="image">Kép:</label><br>
        @if($director->image)
            <img src="{{ asset('storage/' . $director->image) }}" alt="{{ $director->name }}" style="width:150px;display:block;margin-bottom:10px;border-radius:5px;">
        @endif
        <input type="file" name="image" id="image" accept="image/*">
    </div>

    <button type="submit" style="background:#007BFF;color:white;padding:10px 20px;border:none;border-radius:5px;">Frissítés</button>
    <a href="{{ route('directors.index') }}" style="margin-left:10px;">Mégse</a>
</form>
@endsection
