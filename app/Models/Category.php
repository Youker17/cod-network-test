<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent',
    ];
    public function getParent()
    {
        return $this->belongsTo(Category::class, 'parent');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }

    public function products()
    {
        return $this->hasMany(ProductCategory::class);
    }
}
