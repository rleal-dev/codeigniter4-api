<?php

namespace App\Resources;

class ProfileResource extends BaseResource
{
    public function toArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
