<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectorController extends Controller
{
    /**
     * List all directors.
     */
    public function index()
    {
        $directors = Director::paginate(12);
        return view('directors.index', compact('directors'));
    }

    /**
     * Show form for creating a new director.
     */
    public function create()
    {
        return view('directors.create');
    }

    /**
     * Store a newly created director in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|max:2048', // max 2 MB
        ]);

        $director = new Director();
        $director->name = $request->name;

        if ($request->hasFile('image')) {
            $director->image = $request->file('image')->store('directors', 'public');
        }

        $director->save();

        return redirect()->route('directors.index')->with('success', 'Director created successfully!');
    }

    /**
     * Display the specified director.
     */
    public function show(Director $director)
    {
        return view('directors.show', compact('director'));
    }

    /**
     * Show the form for editing the specified director.
     */
    public function edit(Director $director)
    {
        return view('directors.edit', compact('director'));
    }

    /**
     * Update the specified director in storage.
     */
    public function update(Request $request, Director $director)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|max:2048',
        ]);

        $director->name = $request->name;

        if ($request->hasFile('image')) {
            if ($director->image) {
                Storage::disk('public')->delete($director->image);
            }
            $director->image = $request->file('image')->store('directors', 'public');
        }

        $director->save();

        return redirect()->route('directors.index')->with('success', 'Director updated successfully!');
    }

    /**
     * Remove the specified director from storage.
     */
    public function destroy(Director $director)
    {
        if ($director->image) {
            Storage::disk('public')->delete($director->image);
        }

        $director->delete();

        return redirect()->route('directors.index')->with('success', 'Director deleted successfully!');
    }
}
