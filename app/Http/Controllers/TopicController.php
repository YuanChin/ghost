<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Topic $topic
     * @param Category $category
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factor
     */
    public function index(Request $request, Topic $topic, Category $category)
    {
        $topics = $topic->withOrder($order = $request->input('order', ""))
                        ->with('user', 'category')
                        ->paginate(20);
        $categories = $category->all();

        return view('topics.index', [
            'topics'        => $topics,
            'categories'    => $categories,
            'order'         => $order
        ]);
    }
}
