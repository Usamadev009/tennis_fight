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
            'fullName' => $this->fullName,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'dob' => $this->dob,
            'phoneNumber' => $this->phoneNumber,
            'gender' => $this->gender,
            'firebaseCustomToken' => $this->fcmToken,
            'address' => [
                'completeAddress' => $this->completeAddress,
                'city' => $this->city,
                'postalCode' => $this->postalCode,
                'state' => $this->state,
                'country' => $this->country,
            ],
            'emergencyContact' => [
                'userName' => $this->emergencyContactName,
                'relationship' =>  $this->emergencyContactRelation,
                'phoneNumber' => $this->emergencyContactNumber,
            ],
            'remember_token' => $this->remember_token,
        ];
    }
}
