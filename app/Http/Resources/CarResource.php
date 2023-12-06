<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'body_text' => $this->body_text,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'body_id' => $this->body_id,
        ];
    }
    public function withResponse($request, $response)
    {
        $response->header('Content-Type', 'application/json');
    }
}
