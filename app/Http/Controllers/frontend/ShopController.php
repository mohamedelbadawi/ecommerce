<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function viewProductDetails(Product $product)
    {
        return view('front.detail', compact('product'));
    }

    public function showShop()
    {
        return view('front.shop');
    }
}
