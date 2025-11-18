<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
    public function index()
    {
        $movies = Movie::with(['director', 'category'])->paginate(12); // 12 film per page
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new movie.
     */
    public function create()
    {
        $directors = Director::all();
        $categories = Category::all();
        return view('movies.create', compact('directors', 'categories'));
    }

    /**
     * Store a newly created movie in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'director_id' => 'required|exists:directors,id',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|max:2048', // max 2MB
        ]);

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director_id = $request->director_id;
        $movie->category_id = $request->category_id;

        if ($request->hasFile('cover_image')) {
            $movie->cover_image = $request->file('cover_image')->store('films', 'public');
        }

        $movie->save();

        return redirect()->route('movies.index')->with('success', 'Movie created successfully!');
    }

    /**
     * Display the specified movie.
     */
    public function show(Movie $movie)
    {
        $movie->load(['director', 'category', 'actors']);
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified movie.
     */
    public function edit(Movie $movie)
    {
        $directors = Director::all();
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'directors', 'categories'));
    }

    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'director_id' => 'required|exists:directors,id',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director_id = $request->director_id;
        $movie->category_id = $request->category_id;

        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($movie->cover_image) {
                Storage::disk('public')->delete($movie->cover_image);
            }
            $movie->cover_image = $request->file('cover_image')->store('films', 'public');
        }

        $movie->save();

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified movie from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->cover_image) {
            Storage::disk('public')->delete($movie->cover_image);
        }

        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }

    /**
     * Display a gallery view of movies.
     */
    public function gallery()
    {
        $movies = Movie::with(['director', 'category'])->get();
        return view('movies.gallery', compact('movies'));
    }
}
