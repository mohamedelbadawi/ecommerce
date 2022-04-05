<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class FeaturedProduct extends Component
{
    public function render()
    {
        $featuredProducts=Product::where('featured',1)->where('status',1)->with(['tags','category','attributes'])->inRandomOrder()->limit(8)->get();
        return view('livewire.frontend.featured-product',compact('featuredProducts'));
    }
}
