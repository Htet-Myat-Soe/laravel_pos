<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Product;
use Carbon\Carbon;

class ProductAddComponent extends Component
{
    use WithFileUploads;

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

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function resetForm(){
        $this->name = "";
        $this->slug = "";
        $this->product_code = "";
        $this->price = "";
        $this->cost = "";
        $this->category_id = "";
        $this->barcode = "";
        $this->quantity = "";
        $this->alert_quantity = "";
        $this->tax = "";
        $this->tax_type = "";
        $this->unit = "";
        $this->description = "";
        $this->images = "";
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'product_code' => 'required|unique:products',
            'price' => 'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'cost' => 'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'category_id' => 'required',
            'barcode' => 'required',
            'quantity' => 'required',
            'alert_quantity' => 'required',
            'tax' => 'nullable|required',
            'tax_type' => 'required',
            'unit' => 'required',
            'description' => 'nullable',
        ]);
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'product_code' => 'required|unique:products',
            'price' => 'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'cost' => 'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'category_id' => 'required',
            'barcode' => 'required',
            'quantity' => 'required',
            'alert_quantity' => 'required',
            'tax' => 'nullable|required',
            'tax_type' => 'required',
            'unit' => 'required',
            'description' => 'nullable',
        ]);

        $product = new Product();

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->product_code = $this->product_code;
        $product->price = $this->price;
        $product->cost = $this->cost;
        $product->category_id = $this->category_id;
        $product->barcode = $this->barcode;
        $product->quantity = $this->quantity;
        $product->alert_quantity = $this->alert_quantity;
        $product->tax = $this->tax;
        $product->tax_type = $this->tax_type;
        $product->unit = $this->unit;
        $product->description = $this->description;

        if ($this->images) {
            $imagesname = null;

            foreach ($this->images as $key => $image) {
                $imgName = Carbon::now()->timestamp.$key.'.'.$image->extension();
                $image->storeAs('products',$imgName);
                $imagesname = $imagesname.','.$imgName;
            }
            $product->images = $imagesname;
        }

        $product->save();
        $this->emit('product_created');
        $this->resetForm();

    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.product-add-component',['categories' => $categories])->layout('layouts.admin-base');
    }
}
