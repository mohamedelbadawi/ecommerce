<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = Product::with('attributes')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function show(Product $product)
    {

        return view('admin.product.attributes.index', compact('product'));
    }

    public function editAttribute(ProductAttribute $attribute)
    {
        return view('admin.product.attributes.edit', compact('attribute'));
    }
}
