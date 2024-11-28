<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategorySubproducts extends Component
{
    public $category;
    public $products = [];

    public function render()
    {
        return view('livewire.category-subproducts');
    }

    public function loadProducts()
    {
        $this->products = $this->category->products()->where('status', 2)->take(3)->get();
        $this->emit('glider', $this->category->id);
    }
}
