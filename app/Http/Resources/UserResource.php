<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'document_type' => $this->document_type,
            'number_document' => $this->number_document,
            'telephone' => $this->telephone,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'birthdate' => $this->birthdate,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'role_id' => $this->role_id,
            'role' => $this->role->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
