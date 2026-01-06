<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqCategoriesController extends Controller
{
    public function index(): View
    {
        $categories = FaqCategory::withCount('faqItems')->orderBy('name')->get();
        
        return view('admin.faq-categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.faq-categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create($validated);

        return redirect()->route('admin.faq-categories.index')->with('success', 'Category created successfully');
    }

    public function edit(FaqCategory $faqCategory): View
    {
        return view('admin.faq-categories.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $faqCategory): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faqCategory->update($validated);

        return redirect()->route('admin.faq-categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(FaqCategory $faqCategory): RedirectResponse
    {
        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')->with('success', 'Category deleted successfully');
    }
}
