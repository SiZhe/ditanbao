<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\View;
use App\Models\Stall;

class StallController extends BaseController {
    
    public function index() {
        $stalls = Stall::orderByDesc('id')->paginate(20);
        return View::make('backend.stalls', compact('stalls'));
    }
    
    public function show($stall) {
        $products = $stall->products()->orderByDesc('id')->take(30)->get();
        return view('backend.stall', compact('products', 'stall'));
    }
}