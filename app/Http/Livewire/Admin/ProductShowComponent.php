<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductShowComponent extends Component
{
    public $product_id;
    public $name;
    public $slug;
    public $product_code;
    public $price;
    public $cost;
    public $category_id;
    public $barcode;
    public $quantity;
    public $alert_quantity;
    public $tax;
    public $tax_type;
    public $unit;
    public $description;
    public $images = [];
    public $created_at;

    public function mount($slug){
        $product = Product::where('slug',$slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->product_code = $product->product_code;
        $this->price = $product->price;
        $this->cost = $product->cost;
        $this->category = Category::find($product->category_id)->name;
        $this->barcode = $product->barcode;
        $this->quantity = $product->quantity;
        $this->alert_quantity = $product->alert_quantity;
        $this->tax = $product->tax;
        $this->tax_type = $product->tax_type;
        $this->unit = $product->unit;
        $this->description = $product->description;
        $this->images = $product->images;
        $this->created_at = $product->created_at->format('d/m/Y');

    }
    public function render()
    {
        return view('livewire.admin.product-show-component')->layout('layouts.admin-base');
    }
}
