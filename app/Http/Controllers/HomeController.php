<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        $featuredProducts = Product::latest()->take(3)->get();

        return view('welcome', compact('featuredProducts'));
    }
}