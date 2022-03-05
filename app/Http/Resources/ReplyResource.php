<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // 附加訊息
        $includes = explode(',', $request->input('include', ''));

        $append = [];
        if (in_array('user', $includes)) {
            $append['user'] = new UserResource($this->user);
        }
        if (in_array('topic', $includes)) {
            $append['topic'] = new TopicResource($this->topic);
        }

        return array_merge(
            [
                'id' => $this->id,
                'user_id' => (int) $this->user_id,
                'topic_id' => (int) $this->topic_id,
                'content' => $this->content,
                'created_at' => (string) $this->created_at,
                'updated_at' => (string) $this->updated_at,
            ],
            $append
        );
    }
}
