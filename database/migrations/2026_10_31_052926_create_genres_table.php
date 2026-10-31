<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Likhain ang genres lookup table
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 2. Kung ang comics table mo ay bagong gawa na may foreignId na, 
        // huwag na itong i-drop. Idagdag lang kung kinakailangan o panatilihin ang foreignId.
        // (Kung wala pang foreignId sa comics table mo, dito mo siya ilalagay:)
        Schema::table('comics', function (Blueprint $table) {
            if (!Schema::hasColumn('comics', 'genre_id')) {
                $table->foreignId('genre_id')->constrained();
            }
        });
    }

    public function down(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->dropConstrainedForeignId('genre_id');
        });

        Schema::dropIfExists('genres');
    }
};