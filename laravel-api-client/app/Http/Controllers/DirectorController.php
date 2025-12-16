<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DirectorController extends Controller
{
    public function index()
    {
        $response = Http::api()->get('directors');

        if ($response->failed()) {
            return redirect()->back()->with('error', $response->json('message') ?? 'Hiba a rendezők lekérésekor.');
        }

        $directors = $response->json('data') ?? $response->json();
        return view('directors.index', compact('directors'));
    }

    public function create()
    {
        return view('directors.create');
    }

    public function store(DirectorRequest $request)
    {
        $data = $request->validated();
        $response = Http::api()->withToken($this->token)->post('directors', $data);

        if ($response->failed()) {
            return redirect()->back()->withInput()->with('error', $response->json('message') ?? 'Hiba a létrehozásnál.');
        }

        return redirect()->route('directors.index')->with('success', 'Rendező létrehozva!');
    }

    public function show($id)
    {
        $response = Http::api()->get("directors/{$id}");
        if ($response->failed()) {
            return redirect()->route('directors.index')->with('error', 'Nem található.');
        }
        $director = $response->json('director') ?? $response->json('data') ?? $response->json();
        return view('directors.show', compact('director'));
    }

    public function edit($id)
    {
        $response = Http::api()->get("directors/{$id}");
        $director = $response->json('director') ?? $response->json('data') ?? $response->json();
        return view('directors.edit', compact('director'));
    }

    public function update(DirectorRequest $request, $id)
    {
        $data = $request->validated();
        $response = Http::api()->withToken($this->token)->put("directors/{$id}", $data);

        if ($response->failed()) {
            return redirect()->back()->withInput()->with('error', $response->json('message') ?? 'Frissítés sikertelen.');
        }

        return redirect()->route('directors.index')->with('success', 'Rendező frissítve!');
    }

    public function destroy($id)
    {
        $response = Http::api()->withToken($this->token)->delete("directors/{$id}");

        if ($response->failed()) {
            return redirect()->route('directors.index')->with('error', $response->json('message') ?? 'Törlés sikertelen.');
        }

        return redirect()->route('directors.index')->with('success', 'Rendező törölve!');
    }
}
