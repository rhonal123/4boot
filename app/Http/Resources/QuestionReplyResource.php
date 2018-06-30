<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ReplyResource;

class QuestionReplyResource extends JsonResource
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
            'question' => $this->question,
            'client' => new ClientResource($this->client),
            'reply' => new ReplyResource($this->reply),
            'created_at' => $this->created_at,
            'status' => $this->status
        ];    

    }
}
