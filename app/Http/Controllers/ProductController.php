<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $data = $this->productService->getAllProducts($request);

        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduct $request)
    {
        //

        $validated = $request->validated();

        $product = $this->productService->createProduct($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = $this->productService->showProduct($id);

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = $this->productService->editProduct($id);

        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduct $request, string $id)
    {
        //
        $validated = $request->validated();

        $product = $this->productService->updateProduct($id, $validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = $this->productService->deleteProduct($id);

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
   
    }
}
