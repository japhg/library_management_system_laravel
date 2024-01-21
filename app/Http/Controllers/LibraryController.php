<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGenre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibraryController extends Controller
{
    public function dashboard(){
        return view('library.dashboard');
    }
    public function book(){
        $books = Book::all();
        $book_genres = BookGenre::all();
        return view('library.book', ['books' => $books, 'book_genres' => $book_genres]);
    }

    public function addBook(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|date',
            'genre' => 'required',
            'description' => '',
            'language' => 'required',
            'number_of_pages' => 'required',
            'quantity_available' => 'required',
            'location' => 'required',
            'condition' => 'required',
            'date_acquired' => 'required|date',
            'keywords' => 'required',
            'ratings' => 'required',
            'availability_status' => 'required',
            'additional_notes' => 'nullable',
            'edition' => 'required'
        ]);

        Book::create($data);
        return redirect(route('library.book'))->with('success', 'Book Added Successfully');
    }

    public function updateBook(Book $book, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|date',
            'genre' => 'required',
            'description' => '',
            'language' => 'required',
            'number_of_pages' => 'required',
            'quantity_available' => 'required',
            'location' => 'required',
            'condition' => 'required',
            'date_acquired' => 'required|date',
            'keywords' => 'required',
            'ratings' => 'required',
            'availability_status' => 'required',
            'additional_notes' => 'nullable',
            'edition' => 'required'
        ]);

        $book->update($data);
        return redirect(route('library.book'))->with('success', 'Book Updated Successfully');
    }

    public function deleteBook(Book $book){
        $book->delete();
        return redirect(route('library.book'))->with('success', 'Book Deleted Successfully');
    }
}
