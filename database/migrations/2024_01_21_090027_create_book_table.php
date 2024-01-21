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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('isbn');
            $table->string('publisher');
            $table->date('publication_year');
            $table->string('genre');
            $table->longText('description')->nullable();
            $table->string('language');
            $table->integer('number_of_pages');
            $table->integer('quantity_available');
            $table->string('location');
            $table->string('condition');
            $table->date('date_acquired');
            $table->longText('keywords');
            $table->string('ratings');
            $table->string('availability_status');
            $table->longText('additional_notes')->nullable();
            $table->string('edition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
