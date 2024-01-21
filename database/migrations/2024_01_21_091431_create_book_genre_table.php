<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_genre', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        DB::statement("
            INSERT INTO book_genre (name, created_at, updated_at)
            VALUES
                ('Fiction', NOW(), NOW()),
                ('Non-Fiction', NOW(), NOW()),
                ('Mystery', NOW(), NOW()),
                ('Thriller', NOW(), NOW()),
                ('Science Fiction', NOW(), NOW()),
                ('Fantasy', NOW(), NOW()),
                ('Romance', NOW(), NOW()),
                ('Historical Fiction', NOW(), NOW()),
                ('Biography', NOW(), NOW()),
                ('Autobiography', NOW(), NOW()),
                ('Memoir', NOW(), NOW()),
                ('Self-Help', NOW(), NOW()),
                ('Philosophy', NOW(), NOW()),
                ('Psychology', NOW(), NOW()),
                ('Science', NOW(), NOW()),
                ('History', NOW(), NOW()),
                ('Travel', NOW(), NOW()),
                ('Cooking', NOW(), NOW()),
                ('Poetry', NOW(), NOW()),
                ('Drama', NOW(), NOW()),
                ('Horror', NOW(), NOW()),
                ('Adventure', NOW(), NOW()),
                ('Children', NOW(), NOW()),
                ('Young Adult', NOW(), NOW()),
                ('Comics/Graphic Novels', NOW(), NOW())
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genre');
    }
};
