<?php
namespace App\Services;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function getAllProducts($request)
    {
        $query = Product::query();

        $sortBy = $request->input('sort_by', 'name');
        $sortOrder = $request->input('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);

        $categoryId = $request->input('category_id');
        if ($categoryId) {
            $productIds = ProductCategory::where('category_id', $categoryId)->pluck('product_id');
            $query->whereIn('id', $productIds);
        }

        $products = $query->paginate(5);
        $categories = ProductCategory::all();
        $allcategories = Category::all();

        return compact('products', 'categories', 'allcategories', 'categoryId');
    }

    public function createProduct($validated)
    {
        $productData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ];

        $product = Product::create($productData);
        Log::info($product);

        if (isset($validated['categories']) && is_array($validated['categories'])) {
            $this->attachCategoriesToProduct($validated['categories'], $product->id);
        }

        $this->handleImageUpload($validated['image'], $product);

        return $product;
    }

    public function showProduct($id)
    {
        return Product::findOrFail($id);
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return compact('product', 'categories');
    }

    public function updateProduct($id, $validated)
    {
        $product = Product::findOrFail($id);

        $productData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ];

        $product->update($productData);

        if (isset($validated['categories']) && is_array($validated['categories'])) {
            $this->attachCategoriesToProduct($validated['categories'], $product->id);
        }

        $this->handleImageUpload($validated['image'], $product);

        return $product;
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return $product;
    }

    private function attachCategoriesToProduct($categories, $productId)
    {
        foreach ($categories as $category) {
            ProductCategory::create([
                'category_id' => $category,
                'product_id' => $productId,
            ]);
        }
    }

    private function handleImageUpload($image, $product)
    {
        $imageName = $product->id . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);

        $product->image = $imageName;
        $product->save();
    }
}