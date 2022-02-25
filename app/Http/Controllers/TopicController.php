<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class TopicController extends Controller
{
    public function index(Category $category)
    {
        $categories = $category->all();
        
        return view('topics.index', compact('categories'));
    }
}
