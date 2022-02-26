<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Topic;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Topic $topic
     * @param Category $category
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factor
     */
    public function show(Request $request, Topic $topic, Category $category)
    {
        $topics = $topic->withOrder($order = $request->input('order', ""))
                        ->where('category_id', $category->id)
                        ->with('user', 'category')
                        ->paginate(20);
        $categories = $category->all();

        return view('topics.index', [
            'topics'        => $topics,
            'category'      => $category,
            'categories'    => $categories,
            'order'         => $order
        ]);
    }
}
