<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends BaseController {
    
    public function index() {
        $allCategories = Category::paginate(20);
        $categories = Category::whereNull('parent_id')->get();
        return View::make('backend.categories', compact('allCategories', 'categories'));
    }
    
    public function create() {
        $category = new Category();
        return view('backend.category_form', compact('category'));
    }
    
    public function store() {
        $input = Request::all();
        $validation = Validator::make($input, Category::$rules, Category::$msgs);
        if($validation->passes()) {
            Category::create($input);
            return Redirect::to('/backend/categories');
        }
        
        return Redirect::back()
            ->withInput()
            ->withErrors($validation);
    }
    
    public function edit($categoryId) {
        $category = Category::find($categoryId);
        return View::make('backend.category_form', compact('category'));
    }
    
    public function update($categoryId) {
        $input = Request::all();
        $category = Category::find($categoryId);
        $validation = Validator::make($input, Category::$rules, Category::$msgs);
        if($validation->passes()) {
            $category->update($input);
            return Redirect::to('/backend/categories');
        }
        
        return Redirect::back()
            ->withInput()
            ->withErrors($validation);
    }
}