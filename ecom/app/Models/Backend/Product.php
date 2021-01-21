<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\ProductImage;

class Product extends Model
{
    use HasFactory;

    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function productCategory()
    {
        return $this->belongsTo(Category::class);
    }
    public function productBrand()
    {
        return $this->belongsTo(brands::class);
    }
}
