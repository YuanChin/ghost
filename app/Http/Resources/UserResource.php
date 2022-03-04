<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Whether to display sensitive information
     *
     * @var boolean
     */
    private $sensitiveInformation = false;
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (! $this->sensitiveInformation) {
            $this->resource->makeHidden(['email']);
        }

        $data = parent::toArray($request);

        // Wheater to bound Facebook
        $data['bound_facebook'] = $this->resource->facebook_id ? true : false;

        return $data;
    }

    /**
     * Open the sensitive information
     *
     * @return void
     */
    public function showSensitiveInformation()
    {
        $this->sensitiveInformation = true;

        return $this;
    }
}
