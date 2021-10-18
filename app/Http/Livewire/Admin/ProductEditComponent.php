<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ProductEditComponent extends Component
{

    use WithFileUploads;

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
    public $newImages = [];
    public $images = [];

    public function mount($slug){
        $product = Product::where('slug',$slug)->first();
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->product_code = $product->code;
        $this->price = $product->price;
        $this->cost = $product->cost;
        $this->category_id = $product->category_id;
        $this->barcode = $product->barcode;
        $this->quantity = $product->quantity;
        $this->alert_quantity = $product->alert_quantity;
        $this->tax = $product->tax;
        $this->tax_type = $product->tax_type;
        $this->unit = $product->unit;
        $this->description = $product->description;
        $this->images = $product->images;
        $this->product_code = $product->product_code;

    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function resetForm(){
        $this->name = "";
        $this->price = "";
        $this->cost = "";
        $this->product_code = "";
        $this->category_id = "";
        $this->barcode = "";
        $this->quantity = "";
        $this->alert_quantity = "";
        $this->tax = "";
        $this->tax_type = "";
        $this->unit = "";
        $this->description = "";
        $this->newImages = "";
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories',
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

    public function update(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
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

        $product = Product::find($this->product_id);

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

        if ($this->newImages) {
            $imagesname = null;

            foreach ($this->newImages as $key => $image) {
                $imgName = Carbon::now()->timestamp.$key.'.'.$image->extension();
                $image->storeAs('products',$imgName);
                $imagesname = $imagesname.','.$imgName;
            }
            $product->images = $imagesname;
        }

        $product->save();

        $this->resetForm();
        $this->emit('product_updated');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product-edit-component',['categories' => $categories])->layout('layouts.admin-base');
    }
}
