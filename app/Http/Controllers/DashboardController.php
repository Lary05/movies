<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Category;
use App\Models\Actor;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMovies = Movie::count();
        $totalDirectors = Director::count();
        $totalCategories = Category::count();
        $totalActors = Actor::count();

        // Legújabb 5 film
        $latestMovies = Movie::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact('totalMovies', 'totalDirectors', 'totalCategories', 'totalActors', 'latestMovies'));
    }


}
