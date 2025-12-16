<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{
    public function index()
    {
        $response = Http::api()->get('actors');

        if ($response->failed()) {
            return redirect()->back()->with('error', $response->json('message') ?? 'Hiba az színészek lekérésekor.');
        }

        $actors = $response->json('data') ?? $response->json();
        return view('actors.index', compact('actors'));
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(ActorRequest $request)
    {
        $data = $request->validated();
        $response = Http::api()->withToken($this->token)->post('actors', $data);

        if ($response->failed()) {
            return redirect()->back()->withInput()->with('error', $response->json('message') ?? 'Hiba a létrehozásnál.');
        }

        return redirect()->route('actors.index')->with('success', 'Színész létrehozva!');
    }

    public function show($id)
    {
        $response = Http::api()->get("actors/{$id}");
        if ($response->failed()) {
            return redirect()->route('actors.index')->with('error', 'Nem található.');
        }
        $actor = $response->json('actor') ?? $response->json('data') ?? $response->json();
        return view('actors.show', compact('actor'));
    }

    public function edit($id)
    {
        $response = Http::api()->get("actors/{$id}");
        $actor = $response->json('actor') ?? $response->json('data') ?? $response->json();
        return view('actors.edit', compact('actor'));
    }

    public function update(ActorRequest $request, $id)
    {
        $data = $request->validated();
        $response = Http::api()->withToken($this->token)->put("actors/{$id}", $data);

        if ($response->failed()) {
            return redirect()->back()->withInput()->with('error', $response->json('message') ?? 'Frissítés sikertelen.');
        }

        return redirect()->route('actors.index')->with('success', 'Színész frissítve!');
    }

    public function destroy($id)
    {
        $response = Http::api()->withToken($this->token)->delete("actors/{$id}");

        if ($response->failed()) {
            return redirect()->route('actors.index')->with('error', $response->json('message') ?? 'Törlés sikertelen.');
        }

        return redirect()->route('actors.index')->with('success', 'Színész törölve!');
    }
}
