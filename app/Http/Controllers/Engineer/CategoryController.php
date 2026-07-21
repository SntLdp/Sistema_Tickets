<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\TicketCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = TicketCategory::withCount('tickets')->orderBy('name')->get();

        return view('engineer.categories.index', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:ticket_categories,name'],
            'icon' => ['nullable', 'string', 'max:60'],
        ]);

        TicketCategory::create([
            'name' => $request->input('name'),
            'icon' => $request->input('icon', 'ti-tag'),
            'is_active' => true,
        ]);

        return back()->with('success', 'Categoría creada correctamente.');
    }

    public function toggle(TicketCategory $category): RedirectResponse
    {
        $category->update(['is_active' => ! $category->is_active]);

        return back()->with('success', 'Categoría actualizada.');
    }
}
