<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index(Request $request)
    {
        // Part F: Enable query log
        DB::enableQueryLog();

        $genres = Genre::all();      
        
        $genreId = $request->query('genre_id');
        $year = $request->query('year');

        // WALANG with('genre') muna para tumaas ang query count (Screenshot 6)
        $query = Comic::query();

        if ($genreId && $genreId !== 'all') {
            $query->where('genre_id', $genreId);
        }

        if ($year && $year !== 'all') {
            $query->where('year', $year);
        }

        $comics = $query->get();

        return view('comics.index', [
            'comics'   => $comics,
            'genres'   => $genres,
            'genreId'  => $genreId,
            'year'     => $year,
        ]);
    }

    public function create()
    {
        // Part E Requirement: Pass lookup rows to the create view for the dropdown
        $genres = Genre::all();
        
        return view('comics.create', compact('genres'));
    }

    public function store(Request $request)
    {
        // Part A & E Requirements: Validation rules with keys matching columns exactly
        $validated = $request->validate([
            'title'       => 'required|max:100',
            'author'      => 'required|max:100',
            'year'        => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'price'       => 'required|numeric|min:0',
            'genre_id'    => 'required|exists:genres,id', // Part E: exists rule against lookup table
            'is_featured' => 'sometimes|boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');

        // Part A Requirement: Save using create() with the validated array
        Comic::create($validated);

        return redirect()
            ->route('comics.index')
            ->with('success', 'Comic added successfully.');
    }

    public function show(string $id)
    {
        $comic = Comic::findOrFail($id);

        return view('comics.show', ['comic' => $comic]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function feature()
    {
        $comic = Comic::where('is_featured', true)->first();

        return view('comics.feature', ['comic' => $comic]);
    }
}