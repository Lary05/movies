<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    public function index()
    {
        //$actors = Actor::paginate(12);
        //return view('actors.index', compact('actors'));


        $actors = Actor::all();
        return response()->json([
            'products' => $actors,
        ]);
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:férfi,nő,egyéb',
            'image' => 'nullable|image|max:2048',
        ]);

        $actor = new Actor();
        $actor->name = $request->name;
        $actor->description = $request->description;
        $actor->birth_date = $request->birth_date;
        $actor->gender = $request->gender;

        if ($request->hasFile('image')) {
            $actor->image = $request->file('image')->store('actors', 'public');
        }

        $actor->save();

        return redirect()->route('actors.index')->with('success', 'Actor created successfully!');
    }

    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }

    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    public function update(Request $request, Actor $actor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:férfi,nő,egyéb',
            'image' => 'nullable|image|max:2048',
        ]);

        $actor->name = $request->name;
        $actor->description = $request->description;
        $actor->birth_date = $request->birth_date;
        $actor->gender = $request->gender;

        if ($request->hasFile('image')) {
            if ($actor->image) {
                Storage::disk('public')->delete($actor->image);
            }
            $actor->image = $request->file('image')->store('actors', 'public');
        }

        $actor->save();

        return redirect()->route('actors.index')->with('success', 'Actor updated successfully!');
    }

    public function destroy(Actor $actor)
    {
        if ($actor->image) {
            Storage::disk('public')->delete($actor->image);
        }

        $actor->delete();

        return redirect()->route('actors.index')->with('success', 'Actor deleted successfully!');
    }
}
