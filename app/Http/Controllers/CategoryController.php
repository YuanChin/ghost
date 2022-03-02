<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Link;
use App\Models\Topic;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Topic $topic
     * @param Category $category
     * @param Link $link
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factor
     */
    public function show(Request $request, Topic $topic, Category $category, Link $link)
    {
        $topics = $topic->withOrder($order = $request->input('order', ""))
                        ->where('category_id', $category->id)
                        ->with('user', 'category')
                        ->paginate(20);
        $categories = $category->all();
        $links = $link->getRecommendedResources();

        if ($request->ajax()) {
            return view('topics.topic_list', compact('topics'));
        }

        return view('topics.index', [
            'topics'     => $topics,
            'category'   => $category,
            'categories' => $categories,
            'order'      => $order,
            'links'      => $links,
        ]);
    }
}
