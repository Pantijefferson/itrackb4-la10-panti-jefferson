<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index(Request $request)
    {
        // Kunin ang filter mula sa request o itakda sa 'all' kung wala
        $genre = $request->input('genre', 'all');
        $year = $request->input('year', 'all');

        // Gamitin ang Eloquent query builder
        $query = Comic::query();

        if ($genre !== 'all') {
            $query->where('genre', $genre);
        }

        if ($year !== 'all') {
            $query->where('year', $year);
        }

        $comics = $query->get();

        // Ipasa ang $comics, pati na rin ang $genre at $year sa view
        return view('comics.index', compact('comics', 'genre', 'year'));
    }

    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }
}