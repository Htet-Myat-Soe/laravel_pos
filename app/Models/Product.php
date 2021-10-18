<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'name',
        'slug',
        'product_count',
        'barcode',
        'cost',
        'price',
        'quantity',
        'alert_quantity',
        'tax',
        'tax_type',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
