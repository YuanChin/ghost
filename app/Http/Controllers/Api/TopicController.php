<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TopicRequest;
use App\Http\Resources\TopicResource;
use App\Models\Topic;

class TopicController extends Controller
{
    /**
     * Store a newly created resource in storage
     *
     * @param TopicRequest $request
     * @param Topic $topic
     * @return void
     */
    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = $request->user()->id;
        $topic->save();

        return new TopicResource($topic);
    }

    /**
     * Update the specified the resource in storage.
     *
     * @param TopicRequest $request
     * @param Topic $topic
     * @return void
     */
    public function update(TopicRequest $request, Topic $topic)
    {
        // 權限
        $this->authorize('update', $topic);

        $topic->update($request->all());

        return new TopicResource($topic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Topic $topic
     * @return void
     */
    public function destroy(Topic $topic)
    {
        // 權限
        $this->authorize('destroy', $topic);

        $topic->delete();

        return response(null, 204);
    }
}
