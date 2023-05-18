<?php

namespace App\Http\Resource\User;

use App\Http\Resource\User\UserResource;
use App\Supports\Resources\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray()
    {
        return [
            'data' => UserResource::collection($this->collection),
        ];
    }
}