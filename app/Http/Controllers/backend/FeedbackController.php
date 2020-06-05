<?php

namespace App\Http\Controllers\backend;

use App\Models\Feedback;

class FeedbackController extends BaseController{

    public function index() {
        $feedbacks = Feedback::orderByDesc('id')->paginate(30);
        return view('backend.feedbacks', compact('feedbacks'));
    }
    
}
