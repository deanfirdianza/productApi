<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductDetail;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $with = [
        'productDetails',
        'categories'
    ];

    public function productdetails()
    {
        return $this->hasOne(ProductDetail::class, 'id', 'product_detail_id');
    }
    
    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
