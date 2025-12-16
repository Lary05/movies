<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $needle = $request->get('needle');
        $url = $needle ? 'movies?needle=' . urlencode($needle) : 'movies';

        $response = Http::api()->get($url);

        if ($response->failed()) {
            return redirect()->back()->with('error', $response->json('message') ?? 'Hiba a filmek lekérésekor.');
        }

        $movies = $response->json('data') ?? $response->json();
        return view('movies.index', ['movies' => $movies, 'isAuthenticated' => $this->isAuthenticated()]);
    }

    public function create()
    {
        // Ha szükséged van director/category listára, lekérheted itt
        $directors = Http::api()->get('directors')->json('data') ?? [];
        return view('movies.create', compact('directors'));
    }

    public function store(MovieRequest $request)
    {
        $data = $request->validated();

        $response = Http::api()
            ->withToken($this->token)
            ->post('movies', $data);

        if ($response->failed()) {
            $msg = $response->json('message') ?? 'Nem sikerült létrehozni a filmet.';
            return redirect()->back()->withInput()->with('error', $msg);
        }

        return redirect()->route('movies.index')->with('success', 'Film létrehozva!');
    }

    public function show($id)
    {
        $response = Http::api()->get("movies/{$id}");

        if ($response->failed()) {
            return redirect()->route('movies.index')->with('error', 'Film nem található.');
        }

        $movie = $response->json('movie') ?? $response->json('data') ?? $response->json();
        return view('movies.show', compact('movie'));
    }

    public function edit($id)
    {
        $response = Http::api()->get("movies/{$id}");

        if ($response->failed()) {
            return redirect()->route('movies.index')->with('error', 'Film nem található.');
        }

        $movie = $response->json('movie') ?? $response->json('data') ?? $response->json();
        $directors = Http::api()->get('directors')->json('data') ?? [];
        return view('movies.edit', compact('movie', 'directors'));
    }

    public function update(MovieRequest $request, $id)
    {
        $data = $request->validated();

        $response = Http::api()
            ->withToken($this->token)
            ->put("movies/{$id}", $data);

        if ($response->failed()) {
            return redirect()->back()->withInput()->with('error', $response->json('message') ?? 'Frissítés sikertelen.');
        }

        return redirect()->route('movies.index')->with('success', 'Film frissítve!');
    }

    public function destroy($id)
    {
        $response = Http::api()
            ->withToken($this->token)
            ->delete("movies/{$id}");

        if ($response->failed()) {
            return redirect()->route('movies.index')->with('error', $response->json('message') ?? 'Törlés sikertelen.');
        }

        return redirect()->route('movies.index')->with('success', 'Film törölve!');
    }
    public function exportCsv()
    {
        return Excel::download(new MoviesExport, 'movies.csv');
    }

    public function exportPdf()
    {
        // lekérdezzük az adatokat az API-ból
        $response = Http::api()->get('movies');
        $movies = $response->json('data') ?? $response->json();

        $pdf = Pdf::loadView('movies.pdf', ['movies' => $movies]);
        // ha szeretnél fejléces/ lábléces opciókat: Pdf::loadView(...)->setPaper('a4', 'landscape')
        return $pdf->stream('movies.pdf');
    }
}
