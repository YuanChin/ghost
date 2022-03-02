<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Topic;
use App\Models\Link;
use App\Http\Requests\TopicRequest;
use App\Handlers\ImageUploadHandler;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Topic $topic
     * @param Category $category
     * @param Link $link
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factor
     */
    public function index(Request $request, Topic $topic, Category $category, Link $link)
    {
        $topics = $topic->withOrder($order = $request->input('order', ""))
                        ->with('user', 'category')
                        ->paginate(20);
        $categories = $category->all();
        $links = $link->getRecommendedResources();

        if ($request->ajax()) {
            return view('topics.topic_list', compact('topics'));
        }

        return view('topics.index', [
            'topics'     => $topics,
            'categories' => $categories,
            'order'      => $order,
            'links'      => $links,    
        ]);
    }

    /**
     * Display the specified resource
     *
     * @param Topic $topic
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factor
     */
    public function show(Request $request, Topic $topic)
    {
        // URL 自動矯正
        if ( ! empty($topic->slug) && ($topic->slug != $request->slug)) {
            return redirect($topic->link(), 301);
        }

        $favored = false;
        if ($user = $request->user()) {
            $favored = boolval($user->favoriteTopics()->find($topic->id));
        }

        return view('topics.show', [
            'topic'   => $topic,
            'favored' => $favored,
        ]);
    }

    /**
     * Get the favorit topics that own the user
     *
     * @param Request $request
     * @param Category $category
     * @param Link $link
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function favorites(Request $request, Category $category, Link $link)
    {
        $topics = $request->user()->favoriteTopics()
            ->with('user', 'category')
            ->paginate(10);
        $categories = $category->all();
        $links = $link->getRecommendedResources();
        $favored = true;

        return view('topics.index', [
            'topics'     => $topics,
            'categories' => $categories,
            'favored'    => $favored,
            'links'      => $links,  
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Topic $topic
     * @param Category $category
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factor
     */
    public function create(Topic $topic, Category $category)
    {
        $categories = $category->all();

        return view('topics.create', [
            'topic'      => $topic,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource
     *
     * @param Topic $topic
     * @param Category $category
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factor
     */
    public function edit(Topic $topic, Category $category)
    {
        $this->authorize('update', $topic);
        $categories = $category->all();

        return view('topics.edit', [
            'topic'      => $topic,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TopicRequest $request
     * @param Topic $topic
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect()->to($topic->link())->with('success', '話題創建成功！');
    }

    /**
     * Update the specified resource in storage
     *
     * @param TopicRequest $request
     * @param Topic $topic
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->update($request->all());

        return redirect()->to($topic->link())->with('success', '話題更新成功！');
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);
        $topic->delete();

        return [];
    }

    /**
     * Upload the images of the topic
     *
     * @param Request $request
     * @param ImageUploadHandler $uploader
     * @return void
     */
    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        $data = [
            'success'   => false,
            'msg'       => '上傳失敗!',
            'file_path' => ''
        ];

        if ($file = $request->upload_file) {
            $result = $uploader->save($file, 'topics', Auth::id(), 1024);

            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg'] = "上傳成功!";
                $data['siccess'] = true;
            }
        }

        return $data;
    }

    /**
     * Collect a favorite topic
     * 
     * @param Request $request
     * @param Topic $topic
     * @return void
     */
    public function favor(Request $request, Topic $topic)
    {
        $user = $request->user();

        if ($user->favoriteTopics()->find($topic->id)) {
            return [];
        }

        $user->favoriteTopics()->attach($topic);

        return [];
    }

    /**
     * Cancel to collect a favorite topic
     *
     * @param Request $request
     * @param Topic $topic
     * @return void
     */
    public function disfavor(Request $request, Topic $topic)
    {
        $user = $request->user();
        $user->favoriteTopics()->detach($topic);

        return[];
    }
}
