<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FaceResource;

class FaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'nick_name' => $this->nick_name,
          'image' => $this->url,
          // 'shouts' => ($this->shoutouts ? FaceResource::collection($this->shoutOuts) : NULL),
        ];
    }
}
