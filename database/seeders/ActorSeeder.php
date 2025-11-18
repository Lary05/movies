<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actors = [
            ['name'=>'Leonardo DiCaprio','gender'=>'férfi','birth_date'=>'1974-11-11', 'image' => 'actors/actor_1.jpg'],
            ['name'=>'Brad Pitt','gender'=>'férfi','birth_date'=>'1963-12-18', 'image' => 'actors/actor_2.jpg'],
            ['name'=>'Scarlett Johansson','gender'=>'nő','birth_date'=>'1984-11-22', 'image' => 'actors/actor_3.jpg'],
            ['name'=>'Natalie Portman','gender'=>'nő','birth_date'=>'1981-06-09', 'image' => 'actors/actor_4.jpg'],
            ['name'=>'Tom Hanks','gender'=>'férfi','birth_date'=>'1956-07-09', 'image' => 'actors/actor_5.jpg'],
            ['name'=>'Emma Stone','gender'=>'nő','birth_date'=>'1988-11-06', 'image' => 'actors/actor_6.jpg'],
            ['name'=>'Morgan Freeman','gender'=>'férfi','birth_date'=>'1937-06-01', 'image' => 'actors/actor_7.jpg'],
            ['name'=>'Meryl Streep','gender'=>'nő','birth_date'=>'1949-06-22', 'image' => 'actors/actor_8.jpg'],
            ['name'=>'Denzel Washington','gender'=>'férfi','birth_date'=>'1954-12-28', 'image' => 'actors/actor_9.jpg'],
            ['name'=>'Jennifer Lawrence','gender'=>'nő','birth_date'=>'1990-08-15', 'image' => 'actors/actor_10.jpg'],
            ['name'=>'Johnny Depp','gender'=>'férfi','birth_date'=>'1963-06-09', 'image' => 'actors/actor_11.jpg'],
            ['name'=>'Keira Knightley','gender'=>'nő','birth_date'=>'1985-03-26', 'image' => 'actors/actor_12.jpg'],
            ['name'=>'Robert Downey Jr.','gender'=>'férfi','birth_date'=>'1965-04-04', 'image' => 'actors/actor_13.jpg'],
            ['name'=>'Anne Hathaway','gender'=>'nő','birth_date'=>'1982-11-12', 'image' => 'actors/actor_14.jpg'],
            ['name'=>'Christian Bale','gender'=>'férfi','birth_date'=>'1974-01-30', 'image' => 'actors/actor_15.jpg'],
            ['name'=>'Angelina Jolie','gender'=>'nő','birth_date'=>'1975-06-04', 'image' => 'actors/actor_16.jpg'],
            ['name'=>'Matthew McConaughey','gender'=>'férfi','birth_date'=>'1969-11-04', 'image' => 'actors/actor_17.jpg'],
            ['name'=>'Charlize Theron','gender'=>'nő','birth_date'=>'1975-08-07', 'image' => 'actors/actor_18.jpg'],
            ['name'=>'Will Smith','gender'=>'férfi','birth_date'=>'1968-09-25', 'image' => 'actors/actor_19.jpg'],
            ['name'=>'Julia Roberts','gender'=>'nő','birth_date'=>'1967-10-28', 'image' => 'actors/actor_20.jpg'],
            ['name'=>'Hugh Jackman','gender'=>'férfi','birth_date'=>'1968-10-12', 'image' => 'actors/actor_21.jpg'],
            ['name'=>'Cate Blanchett','gender'=>'nő','birth_date'=>'1969-05-14', 'image' => 'actors/actor_22.jpg'],
            ['name'=>'Ryan Gosling','gender'=>'férfi','birth_date'=>'1980-11-12', 'image' => 'actors/actor_23.jpg'],
            ['name'=>'Sandra Bullock','gender'=>'nő','birth_date'=>'1964-07-26', 'image' => 'actors/actor_24.jpg'],
            ['name'=>'Chris Hemsworth','gender'=>'férfi','birth_date'=>'1983-08-11', 'image' => 'actors/actor_25.jpg'],
            ['name'=>'Gal Gadot','gender'=>'nő','birth_date'=>'1985-04-30', 'image' => 'actors/actor_26.jpg'],
            ['name'=>'Samuel L. Jackson','gender'=>'férfi','birth_date'=>'1948-12-21', 'image' => 'actors/actor_27.jpg'],
            ['name'=>'Nicole Kidman','gender'=>'nő','birth_date'=>'1967-06-20', 'image' => 'actors/actor_28.jpg'],
            ['name'=>'Mark Ruffalo','gender'=>'férfi','birth_date'=>'1967-11-22', 'image' => 'actors/actor_29.jpg'],
            ['name'=>'Natalie Dormer','gender'=>'nő','birth_date'=>'1982-02-11', 'image' => 'actors/actor_30.jpg'],
        ];

        foreach ($actors as $actor) {
            Actor::create($actor);
        }
    }
}
