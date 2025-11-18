@extends('layouts.app')

@section('content')
<h2>Új színész</h2>

@if ($errors->any())
    <div style="color:red; margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('actors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div style="margin-bottom:15px;">
        <label for="name">Név:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="description">Leírás:</label><br>
        <textarea name="description" id="description" rows="4" style="width:100%; padding:8px;">{{ old('description') }}</textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label for="birth_date">Születési dátum:</label><br>
        <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="gender">Nem:</label><br>
        <select name="gender" id="gender" style="width:100%; padding:8px;">
            <option value="">-- Válassz nemet --</option>
            <option value="férfi" {{ old('gender')=='férfi' ? 'selected' : '' }}>Férfi</option>
            <option value="nő" {{ old('gender')=='nő' ? 'selected' : '' }}>Nő</option>
            <option value="egyéb" {{ old('gender')=='egyéb' ? 'selected' : '' }}>Egyéb</option>
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label for="image">Kép:</label><br>
        <input type="file" name="image" id="image" accept="image/*">
    </div>

    <button type="submit" style="background-color:#28a745; color:white; padding:10px 20px; border:none; border-radius:5px;">Save Actor</button>
    <a href="{{ route('actors.index') }}" style="margin-left:10px;">Cancel</a>
</form>
@endsection
