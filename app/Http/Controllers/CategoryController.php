<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use App\Http\Requests\UpdateProduct;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        //
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $parentCategories = Category::whereNull('parent')->get();

        return view('categories.create', ['parentCategories' => $parentCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategory $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'parent_category' => 'nullable|exists:categories,id',
        ]);

        $category = new Category();
        $category->name = $validatedData['name'];

        // If a parent category is selected
        if (isset($validatedData['parent_category'])) {
            $category->parent = $validatedData['parent_category'];
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('categories.show')->with('category', Category::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $parentCategories = Category::whereNull('parent')->get();

        return view('categories.edit', [
            'category' => $category,
            'parentCategories' => $parentCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategory $request, string $id)
    {
        //
        $validatedData = $request->validated();

        $category = Category::findOrFail($id);
        $category->name = $validatedData['name'];

        // If a parent category is selected
        

        if ($validatedData['parent'] !== null) {
            $category->parent = $validatedData['parent'];
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
