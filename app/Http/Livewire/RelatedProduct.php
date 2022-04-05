<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class RelatedProduct extends Component
{
    public $category_id;

    public function mount($category_id)
    {
        $this->category_id = $category_id;
    }

    public function render()
    {
        $products = Product::where('category_id', $this->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.related-product', compact('products'));
    }
}
