<?php

namespace App\Http\Resource\User;

use App\Supports\Resources\JsonResource;

class UserResource extends JsonResource
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'full_name' => "{$this->first_name} {$this->last_name}",
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}