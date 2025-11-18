@extends('layouts.app')

@section('content')
<h2>Szerkesztés</h2>

@if ($errors->any())
    <div style="color:red; margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('actors.update', $actor) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div style="margin-bottom:15px;">
        <label for="name">Név:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $actor->name) }}" required style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="description">Leírás:</label><br>
        <textarea name="description" id="description" rows="4" style="width:100%; padding:8px;">{{ old('description', $actor->description) }}</textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label for="birth_date">Születési dátum:</label><br>
        <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $actor->birth_date) }}" style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="gender">Gender:</label><br>
        <select name="gender" id="gender" style="width:100%; padding:8px;">
            <option value="">-- Válassz nemet --</option>
            <option value="nő" {{ old('gender', $actor->gender)=='nő' ? 'selected' : '' }}>Nő</option>
            <option value="férfi" {{ old('gender', $actor->gender)=='férfi' ? 'selected' : '' }}>Férfi</option>
            <option value="egyéb" {{ old('gender', $actor->gender)=='egyéb' ? 'selected' : '' }}>Egyéb</option>
        </select>
    </div>


    <div style="margin-bottom:15px;">
        <label for="image"></label><br>
        @if($actor->image)
            <img src="{{ asset('storage/' . $actor->image) }}" alt="{{ $actor->name }}" style="width:150px; display:block; margin-bottom:10px; border-radius:5px;">
        @endif
        <input type="file" name="image" id="image" accept="image/*">
    </div>

    <button type="submit" style="background-color:#007BFF; color:white; padding:10px 20px; border:none; border-radius:5px;">Frissítés</button>
    <a href="{{ route('actors.index') }}" style="margin-left:10px;">Mégse</a>
</form>
@endsection
