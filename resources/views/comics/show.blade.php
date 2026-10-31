@extends('layouts.app')

@section('title', 'Comic Details')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mb-3">{{ $comic->title }}</h3>

            <p><strong>ID:</strong> {{ $comic->id }}</p>
            <p><strong>Author:</strong> {{ $comic->author }}</p>
            
            <!-- Dito nakalagay ang tamang pagtawag sa relasyon (kailangang may ->name) -->
            <p><strong>Genre:</strong> {{ $comic->genre->name }}</p>

            <p><strong>Year Released:</strong> {{ $comic->year }}</p>
            <p><strong>Price:</strong> ${{ number_format($comic->price, 2) }}</p>
            
            <p><strong>Status:</strong> 
                <span class="badge bg-warning text-dark">
                    {{ $comic->is_featured ? 'Featured' : 'Regular' }}
                </span>
            </p>

            <a href="{{ route('comics.index') }}" class="btn btn-secondary mt-3">
                ← Back to Comics List
            </a>
        </div>
    </div>
@endsection