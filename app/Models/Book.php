<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "book";
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'publisher',
        'publication_year',
        'genre',
        'description',
        'language',
        'number_of_pages',
        'quantity_available',
        'location',
        'condition',
        'date_acquired',
        'keywords',
        'ratings',
        'availability_status',
        'additional_notes',
        'edition'
    ];
}
