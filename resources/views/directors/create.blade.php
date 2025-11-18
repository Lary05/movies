@extends('layouts.app')

@section('content')
<h2>Új rendező</h2>

@if ($errors->any())
    <div style="color:red;margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('directors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="margin-bottom:15px;">
        <label for="name">Név:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required style="width:100%;padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="image">Kép:</label><br>
        <input type="file" name="image" id="image" accept="image/*">
    </div>

    <button type="submit" style="background:#007BFF;color:white;padding:10px 20px;border:none;border-radius:5px;">Mentés</button>
    <a href="{{ route('directors.index') }}" style="margin-left:10px;">Vissza</a>
</form>
@endsection
