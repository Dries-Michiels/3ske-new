<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $newsPosts = NewsPost::orderBy('published_at', 'desc')->paginate(12);
        
        return view('news.index', compact('newsPosts'));
    }

    public function show(string $slug): View
    {
        $newsPost = NewsPost::where('slug', $slug)->firstOrFail();
        
        return view('news.show', compact('newsPost'));
    }
}
