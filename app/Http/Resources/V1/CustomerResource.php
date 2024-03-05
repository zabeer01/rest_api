<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    
    public function toArray(Request $request)
    {
        /* feild filtering */
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'type'=> $this->type,
            'email'=> $this->email,
            'city'=> $this->city,
            'state'=> $this->state,
            'postalCode'=> $this->postal_code
        ];
    }
}
