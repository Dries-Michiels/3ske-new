<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $newsPosts = NewsPost::orderBy('published_at', 'desc')->paginate(15);
        
        return view('admin.news.index', compact('newsPosts'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news_posts,slug',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('news', 'public');
        }

        NewsPost::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News post created successfully');
    }

    public function edit(NewsPost $newsPost): View
    {
        return view('admin.news.edit', compact('newsPost'));
    }

    public function update(Request $request, NewsPost $newsPost): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news_posts,slug,' . $newsPost->id,
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($newsPost->image_path) {
                Storage::disk('public')->delete($newsPost->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('news', 'public');
        }

        $newsPost->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'News post updated successfully');
    }

    public function destroy(NewsPost $newsPost): RedirectResponse
    {
        if ($newsPost->image_path) {
            Storage::disk('public')->delete($newsPost->image_path);
        }

        $newsPost->delete();

        return redirect()->route('admin.news.index')->with('success', 'News post deleted successfully');
    }
}
