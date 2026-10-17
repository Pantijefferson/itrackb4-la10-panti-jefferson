<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = [
            [
                'title' => 'One Piece',
                'author' => 'Eiichiro Oda',
                'year' => 1997,
                'genre' => 'Adventure',
                'is_completed' => false,
                'description' => 'A young pirate captain sets out with his crew to find the ultimate treasure known as the One Piece.',
            ],
            [
                'title' => 'Naruto',
                'author' => 'Masashi Kishimoto',
                'year' => 1999,
                'genre' => 'Action',
                'is_completed' => true,
                'description' => 'A young ninja seeks recognition from his peers and dreams of becoming the Hokage.',
            ],
            [
                'title' => 'Death Note',
                'author' => 'Tsugumi Ohba',
                'year' => 2003,
                'genre' => 'Psychological',
                'is_completed' => true,
                'description' => 'A high school student discovers a supernatural notebook that kills anyone whose name is written in it.',
            ],
            [
                'title' => 'Attack on Titan',
                'author' => 'Hajime Isayama',
                'year' => 2009,
                'genre' => 'Dark Fantasy',
                'is_completed' => true,
                'description' => 'Humanity lives inside cities surrounded by enormous walls to protect themselves from giant humanoid creatures.',
            ],
            [
                'title' => 'Chainsaw Man',
                'author' => 'Tatsuki Fujimoto',
                'year' => 2018,
                'genre' => 'Action',
                'is_completed' => false,
                'description' => 'A young man living in poverty merges with his pet chainsaw devil to survive in a dangerous world.',
            ],
            [
                'title' => 'Spy x Family',
                'author' => 'Tatsuya Endo',
                'year' => 2019,
                'genre' => 'Comedy',
                'is_completed' => false,
                'description' => null, 
            ],
        ];

        foreach ($comics as $comic) {
            Comic::create($comic);
        }

        foreach ($comics as $comic) {
            Comic::create($comic);
        }
    }
    }

