<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqItemsController extends Controller
{
    public function index(): View
    {
        $faqItems = FaqItem::with('faqCategory')->orderBy('faq_category_id')->get();
        
        return view('admin.faq-items.index', compact('faqItems'));
    }

    public function create(): View
    {
        $categories = FaqCategory::orderBy('name')->get();
        
        return view('admin.faq-items.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FaqItem::create($validated);

        return redirect()->route('admin.faq-items.index')->with('success', 'FAQ item created successfully');
    }

    public function edit(FaqItem $faqItem): View
    {
        $categories = FaqCategory::orderBy('name')->get();
        
        return view('admin.faq-items.edit', compact('faqItem', 'categories'));
    }

    public function update(Request $request, FaqItem $faqItem): RedirectResponse
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faqItem->update($validated);

        return redirect()->route('admin.faq-items.index')->with('success', 'FAQ item updated successfully');
    }

    public function destroy(FaqItem $faqItem): RedirectResponse
    {
        $faqItem->delete();

        return redirect()->route('admin.faq-items.index')->with('success', 'FAQ item deleted successfully');
    }
}
