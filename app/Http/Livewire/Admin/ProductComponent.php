<?php

namespace App\Http\Livewire\Admin;

use App\Exports\ProductExport;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{

    public $page_amount = 12;
    public $search;

    public $checked = [];
    public $selectPage = false;



    public function deleteProduct($id){
        $product = Product::find($id);
        if($product->images){
            $images = explode(",",$product->images);
            foreach ($images as $image) {
                if ($image) {
                    unlink(public_path('assets/images/products/').$image);
                }
            }
        }
        $product->delete();
        $this->emit('product_deleted');
    }



    public function updatedSelectPage($value){
        if($value){
            $this->checked = Product::pluck('id')->map(fn ($item) => (string) $item)->toArray();
        }
        else{
            $this->checked = [];
        }
    }

    public function isChecked($product_id){
        return in_array($product_id,$this->checked);
    }

    public function updatedChecked(){
        $this->selectPage = false;
    }


    public function exportExcel(){
        if ($this->checked) {
            return (new ProductExport($this->checked))->download('products.xlsx');
        }
        else{
            $this->emit('please_select');
        }
    }

    public function deleteSelected(){
        if ($this->checked) {
            $this->emit('product_deleted');
            foreach($this->checked as $id){
                $product = Product::find($id);
                if($product->images){
                    $images = explode(",",$product->images);
                    foreach ($images as $image) {
                        if ($image) {
                            unlink(public_path('assets/images/products/').$image);
                        }
                    }
                }
                $product->delete();
            }
            }
        else{
            $this->emit('please_select');
        }
    }


    use WithPagination;
    public function render()
    {
        if($this->search){
            $products = Product::where('name','LIKE',"%$this->search%")->orWhere('product_code','LIKE',"%$this->search%")->orderBy('created_at','DESC')->paginate($this->page_amount);
        }
        else{
            $products = Product::orderBy('created_at','DESC')->paginate($this->page_amount);
        }
        return view('livewire.admin.product-component',['products' => $products])->layout('layouts.admin-base');
    }
}
