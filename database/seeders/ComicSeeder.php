<?php

namespace Database\Seeders;

use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Lookup rows FIRST, each held in a variable (Part D Requirement)
        $a = Genre::create(['name' => 'Action']);
        $b = Genre::create(['name' => 'Sci-Fi']);
        $c = Genre::create(['name' => 'Adventure']);

        // 2. Comics, each pointing at a real genre id via variables
        Comic::create([
            'title'       => 'Spider-Man: Blue',
            'author'      => 'Jeph Loeb',
            'year'        => 2002,
            'price'       => 19.99,
            'genre_id'    => $a->id,      // Action
            'is_featured' => true,
        ]);

        Comic::create([
            'title'       => 'Watchmen',
            'author'      => 'Alan Moore',
            'year'        => 1986,
            'price'       => 24.99,
            'genre_id'    => $b->id,      // Sci-Fi
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Saga',
            'author'      => 'Brian K. Vaughan',
            'year'        => 2012,
            'price'       => 14.99,
            'genre_id'    => $b->id,      // Sci-Fi
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'One Piece Vol. 1',
            'author'      => 'Eiichiro Oda',
            'year'        => 1997,
            'price'       => 9.99,
            'genre_id'    => $c->id,      // Adventure
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Batman: Year One',
            'author'      => 'Frank Miller',
            'year'        => 1987,
            'price'       => 16.99,
            'genre_id'    => $a->id,      // Action
            'is_featured' => false,
        ]);
    }
}