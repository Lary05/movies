@extends('layouts.app')

@section('content')
<h2>Rendezők</h2>

<a href="{{ route('directors.create') }}" style="background:#28a745;color:white;padding:8px 12px;border-radius:5px;">Új rendező</a>

@if(session('success'))
    <p style="color:green; margin-top:10px;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10" cellspacing="0" style="margin-top:15px;width:100%;">
    <thead>
        <tr>
            <th>Sorszámn</th>
            <th>Név</th>
            <th>Kép</th>
            <th>Leírás</th>
        </tr>
    </thead>
    <tbody>
    @forelse($directors as $director)
        <tr>
            <td>{{ $director->id }}</td>
            <td>{{ $director->name }}</td>
            <td>
                @if($director->image)
                    <img src="{{ asset('storage/'.$director->image) }}" alt="{{ $director->name }}" width="80">
                @else
                    Nincs kép
                @endif
            </td>
            <td>
                <a href="{{ route('directors.show', $director) }}">Megtekintés</a> |
                <a href="{{ route('directors.edit', $director) }}">Szerkesztés</a> |
                <form action="{{ route('directors.destroy', $director) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" style="color:red;">Törlés</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No directors found.</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top:15px;">
    {{ $directors->links() }}
</div>
@endsection
