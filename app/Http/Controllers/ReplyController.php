<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ReplyRequest;
use App\Models\Reply;


use function GuzzleHttp\Promise\all;

class ReplyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReplyRequest $request, Reply $reply)
    {
        $reply->content = $request->content;
        $reply->topic_id = $request->topic_id;
        $reply->user_id = Auth::id();
        $reply->save();

        return redirect()->to($reply->topic->link())->with('success', '評論創建成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return [];
    }
}
