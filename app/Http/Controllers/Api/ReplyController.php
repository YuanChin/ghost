<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReplyRequest;
use App\Http\Resources\ReplyResource;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\User;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @param Topic $topic
     * @return void
     */
    public function index(Topic $topic)
    {
        $replies = $topic->replies()
            ->with('user')
            ->paginate();

        return ReplyResource::collection($replies);
    }

    /**
     * Display a listing of the resources
     *
     * @param User $user
     * @return void
     */
    public function repliesOfTheUser(User $user)
    {
        $replies = $user->replies()
            ->with('topic')
            ->paginate();
        return ReplyResource::collection($replies);
    }

    /**
     * Store a newly created resource in storage
     *
     * @param ReplyRequest $request
     * @param Topic $topic
     * @param Reply $reply
     * @return void
     */
    public function store(ReplyRequest $request, Topic $topic, Reply $reply)
    {
        $reply->content = $request->content;
        $reply->topic()->associate($topic);
        $reply->user()->associate($request->user());
        $reply->save();

        return new ReplyResource($reply);
    }

    /**
     * Remove the specified resource from storage
     *
     * @param Topic $topic
     * @param Reply $reply
     * @return void
     */
    public function destroy(Topic $topic, Reply $reply)
    {
        if ($reply->topic_id != $topic->id) {
            abort(404);
        }

        $this->authorize('destroy', $reply);
        $reply->delete();

        return response(null, 204);
    }
}
