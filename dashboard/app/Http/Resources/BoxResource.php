<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoxResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'data' => $this->data,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
