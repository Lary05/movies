@extends('layouts.app')

@section('content')
<h2>Új film</h2>

@if ($errors->any())
    <div style="color:red; margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div style="margin-bottom:15px;">
        <label for="title">Cím:</label><br>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="description">Leírás:</label><br>
        <textarea name="description" id="description" rows="4" style="width:100%; padding:8px;">{{ old('description') }}</textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label for="director_id">Rendező:</label><br>
        <select name="director_id" id="director_id" required style="width:100%; padding:8px;">
            <option value="">-- Válassz rendezőt --</option>
            @foreach($directors as $director)
                <option value="{{ $director->id }}" {{ old('director_id') == $director->id ? 'selected' : '' }}>
                    {{ $director->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label for="category_id">Kategória:</label><br>
        <select name="category_id" id="category_id" required style="width:100%; padding:8px;">
            <option value="">-- Válassz kategóriát --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label for="cover_image">Borítókép:</label><br>
        <input type="file" name="cover_image" id="cover_image" accept="image/*">
    </div>

    <button type="submit" style="background-color:#28a745; color:white; padding:10px 20px; border:none; border-radius:5px;">Mentés</button>
    <a href="{{ route('movies.index') }}" style="margin-left:10px;">Mégse</a>
</form>
@endsection
