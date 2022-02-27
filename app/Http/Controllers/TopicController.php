<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Topic;
use App\Http\Requests\TopicRequest;
use App\Handlers\ImageUploadHandler;

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

        if ($request->ajax()) {
            return view('topics.topic_list', compact('topics'));
        }

        return view('topics.index', [
            'topics'        => $topics,
            'categories'    => $categories,
            'order'         => $order
        ]);
    }

    /**
     * Display the specified resource
     *
     * @param Topic $topic
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factor
     */
    public function show(Topic $topic)
    {
        return view('topics.show', [
            'topic' => $topic
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

        return redirect()->route('topics.show', $topic->id)->with('success', '話題創建成功！');
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

        return redirect()->route('topics.show', $topic->id)->with('success', '話題更新成功！');
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
}
