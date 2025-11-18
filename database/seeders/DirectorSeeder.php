<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directors = [
            'Nincs a listába',
            'Christopher Nolan',        // Inception (DiCaprio), The Dark Knight Trilogy (Christian Bale)
            'Steven Spielberg',         // Catch Me If You Can (DiCaprio, Tom Hanks)
            'Quentin Tarantino',        // Once Upon a Time in Hollywood (DiCaprio, Brad Pitt)
            'Martin Scorsese',          // The Wolf of Wall Street (DiCaprio)
            'James Cameron',            // Titanic (DiCaprio, Kate Winslet), Avatar (Sam Worthington, Zoe Saldana)
            'Peter Jackson',            // Lord of the Rings (Cate Blanchett), King Kong (Naomi Watts)
            'Ridley Scott',             // Gladiator (Russell Crowe), The Martian (Matt Damon)
            'David Fincher',            // Fight Club (Brad Pitt), The Social Network
            'Guillermo del Toro',       // Crimson Peak (Jessica Chastain), Shape of Water
            'Tim Burton',               // Alice in Wonderland (Johnny Depp, Anne Hathaway)
            'Denis Villeneuve',         // Blade Runner 2049 (Ryan Gosling), Dune (Zendaya)
            'Greta Gerwig',             // Little Women (Saoirse Ronan, Emma Watson)
            'Clint Eastwood',           // Gran Torino, Million Dollar Baby (Hilary Swank)
            'Robert Zemeckis',          // Forrest Gump (Tom Hanks), Cast Away (Tom Hanks)
            'Francis Ford Coppola',     // The Godfather (Al Pacino, Robert De Niro)
            'Sofia Coppola',            // Lost in Translation (Scarlett Johansson, Bill Murray)
            'Ron Howard',               // A Beautiful Mind (Russell Crowe, Jennifer Connelly)
            'Guy Ritchie',              // Sherlock Holmes (Robert Downey Jr.), The Gentlemen
            'Patty Jenkins',            // Wonder Woman (Gal Gadot, Chris Pine)
        ];

        foreach ($directors as $dir) {
            Director::create(['name' => $dir]);
        }
    }
}
