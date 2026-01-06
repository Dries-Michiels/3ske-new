<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $categories = FaqCategory::with('faqItems')->orderBy('name')->get();
        
        return view('faq', compact('categories'));
    }
}
