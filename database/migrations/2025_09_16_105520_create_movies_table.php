<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');                 // film címe
            $table->text('description')->nullable(); // leírás
            $table->unsignedBigInteger('director_id'); // rendező hivatkozás
            $table->unsignedBigInteger('category_id');    // műfaj hivatkozás
            $table->string('cover_image')->nullable(); // borítókép útvonala/URL-je

            // Idegen kulcsok
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
