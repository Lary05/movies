@extends('layouts.app')

@section('content')
<h2>Edit Movie</h2>

@if ($errors->any())
    <div style="color:red; margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div style="margin-bottom:15px;">
        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" required style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="4" style="width:100%; padding:8px;">{{ old('description', $movie->description) }}</textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label for="director_id">Director:</label><br>
        <select name="director_id" id="director_id" required style="width:100%; padding:8px;">
            <option value="">-- Select Director --</option>
            @foreach($directors as $director)
                <option value="{{ $director->id }}" {{ old('director_id', $movie->director_id) == $director->id ? 'selected' : '' }}>
                    {{ $director->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label for="category_id">Category:</label><br>
        <select name="category_id" id="category_id" required style="width:100%; padding:8px;">
            <option value="">-- Select Category --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $movie->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label for="cover_image">Cover Image:</label><br>
        @if($movie->cover_image)
            <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}" style="width:150px; display:block; margin-bottom:10px; border-radius:5px;">
        @endif
        <input type="file" name="cover_image" id="cover_image" accept="image/*">
    </div>

    <button type="submit" style="background-color:#007BFF; color:white; padding:10px 20px; border:none; border-radius:5px;">Update Movie</button>
    <a href="{{ route('movies.index') }}" style="margin-left:10px;">Cancel</a>
</form>
@endsection
