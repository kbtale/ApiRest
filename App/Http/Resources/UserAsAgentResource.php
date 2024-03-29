<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAsAgentResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at->format(config('app.app_date_format')),
            'updated_at' => $this->updated_at->format(config('app.app_date_format')),
        ];
    }
}
