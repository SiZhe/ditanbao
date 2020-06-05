<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\View;
use App\Models\Product;

class ProductController extends BaseController {
    
    public function index($stall) {
        $products = Product::where('stall_id', $stall->id)->orderByDesc('id')->paginate(20);
        return View::make('backend.products', compact('products', 'stall'));
    }
}