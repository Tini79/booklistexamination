<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Rating;

class DashboardController extends Controller
{
    public function index() {
        $authors = Author::withCount('ratings')->orderBy('ratings_count', 'desc')->take(10)->get();

        return view('/dashboard.index', [
            'title' => 'Books List | Dashboard',
            'authors' => $authors
        ]);
    }
}
