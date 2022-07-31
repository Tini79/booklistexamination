<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Rating;


class BookListController extends Controller
{
    public function index(Request $request)
    {
        $number = $request->numberOfRecord;

        $books = Book::with('ratings')->get();

        if(!isset($request->numberOfRecord)) {
            $books = Book::when(isset($request->search), function($q) use($request) {
                $q->where('bookName', 'like', "%{$request->search}%");
            })->orwhereHas('author', function($q2) use($request) {
                $q2->where('authorName', 'like', "%{$request->search}%");
            })->paginate(10);
        } else {
            $books = Book::when(isset($request->search), function($q) use($request) {
                $q->where('bookName', 'like', "%{$request->search}%");
            })->orwhereHas('author', function($q2) use($request) {
                $q2->where('authorName', 'like', "%{$request->search}%");
            })->paginate($number);
        }
        
        
        $listShownNumbers = [10, 50, 250, 500];
        
        return view('/booklist.index', [
            'title' => 'Book List | Book List',
            'books' => $books,
            'listShownNumbers' => $listShownNumbers
        ]);
    }

    public function create() {
        $authors = Author::with('books', 'ratings')->get();

        for($i = 1; $i <= 10; $i++) {
            $values[] = $i;
        }

        return view('/formrating.index', [
            'title' => 'Book List | Form Rating',
            'authors' => $authors,
            'values' => $values,
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'author_id' => 'required',
            'book_id' => 'required',
            'rating' => 'required'
        ]);

        Rating::create($validatedData);

        return redirect('/booklist');
    }
}
