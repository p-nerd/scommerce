<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('subCategories')->get();

        return view('dashboard/categories/index', [
            'categories' => $categories,
        ]);
    }

    public function subCategories(Category $category)
    {
        return view('dashboard/categories/index', [
            'category' => $category,
            'categories' => $category->subCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/categories/create', [
            'categories' => Category::getParentCategoryOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ]);

        $slug = Str::slug($payload['name']);

        $category = Category::query()->where('slug', $slug)->first();
        if ($category) {
            throw ValidationException::withMessages([
                'name' => 'The category already exist',
            ]);
        }

        Category::create([
            ...$payload,
            'slug' => $slug,
        ]);

        return to_route('dashboard.categories')->with(['success' => 'Category created.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard/categories/edit', [
            'category' => $category,
            'categories' => Category::getParentCategoryOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $payload = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ]);

        $category->update($payload);

        return to_route('dashboard.categories.edit', ['category' => $category])->with(['success' => 'Category updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with(['success' => 'Category deleted.']);
    }
}