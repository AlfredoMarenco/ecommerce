<?php

namespace App\Http\Livewire;

use App\Models\Subcategory;
use Livewire\Component;

class CategorySubproducts extends Component
{
    public $category;
    public $products = [];
    public $subcategory;

    public function render()
    {
        return view('livewire.category-subproducts');
    }

    public function loadProducts()
    {
        $subcategory_id = Subcategory::where('name', '=', $this->subcategory)->first();
        $this->products = $this->category->products()->where('subcategory_id',$subcategory_id->id)->where('status', 2)->take(3)->get();
        $this->emit('glider2', $this->category->id);
    }
}
