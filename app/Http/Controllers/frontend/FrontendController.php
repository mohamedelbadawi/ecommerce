<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use function view;

class FrontendController extends Controller
{
    public function index()
    {
        $mainCategories = Category::whereNull('parent_id')->whereStatus(1)->get();
        return view('front.index', compact('mainCategories'));
    }


    public function viewCart()
    {
        return view('front.cart');
    }
}
