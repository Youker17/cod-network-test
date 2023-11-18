<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'category_id',
    ];
    public function getCategories()
    {
        return ProductCategory::where('product_id', $this->id)->get();
    }

}
