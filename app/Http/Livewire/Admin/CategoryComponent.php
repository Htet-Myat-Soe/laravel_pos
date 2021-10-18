<?php

namespace App\Http\Livewire\Admin;

use App\Exports\CategoryExport;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CategoryComponent extends Component
{
    public $page_amount = 12;
    public $search;

    public $cat_id;
    public $name;
    public $slug;

    public $checked = [];
    public $selectPage = false;



    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function resetCategoryCreate(){
        $this->name = null;
        $this->slug = null;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
    }

    // Add Category

    public function store(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->product_count = 0;
        $category->save();

        $this->resetCategoryCreate();
        session()->flash('category_created','Category Created Successfully');
        $this->emit('category_created');


    }

    // Edit Category

    public function editCategory($id){
        $category = Category::find($id);

        $this->cat_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;

    }

    // Update Category

    public function update(){

        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
        $category = Category::find($this->cat_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->product_count = count($category->products);
        $category->save();

        $this->resetCategoryCreate();
        session()->flash('category_updated','Category Updated Successfully');
        $this->emit('category_updated');
    }

    // Delete Category

    public function delete($id){
        $this->emit('category_deleted');
        $category = Category::find($id);
        $category->delete();
        session()->flash('category_deleted','Category Deleted Successfully');
    }

    public function updatedSelectPage($value){
        if($value){
            $this->checked = Category::pluck('id')->map(fn ($item) => (string) $item)->toArray();
        }
        else{
            $this->checked = [];
        }
    }

    public function isChecked($category_id){
        return in_array($category_id,$this->checked);
    }

    public function updatedChecked(){
        $this->selectPage = false;
    }


    public function exportExcel(){
        if ($this->checked) {
            return (new CategoryExport($this->checked))->download('categories.xlsx');
        }
        else{
            $this->emit('please_select');
        }
    }

    public function deleteSelected(){
        if ($this->checked) {
            $this->emit('category_deleted');
            foreach($this->checked as $id){
                $category = Category::find($id);
                $category->delete();
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
            $categories = Category::where('name','LIKE',"%$this->search%")->orderBy('created_at','DESC')->paginate($this->page_amount);
        }
        else{
            $categories = Category::orderBy('created_at','DESC')->paginate($this->page_amount);
        }
        return view('livewire.admin.category-component',['categories' => $categories])->layout('layouts.admin-base');
    }
}
