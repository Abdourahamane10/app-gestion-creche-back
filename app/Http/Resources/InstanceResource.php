<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->idInstance,
            'code_instance' => $this->codeInstance,
            'nom_instance' => $this->nomInstance,
            'services' => ServiceResource::collection($this->services)
        ];
    }
}
