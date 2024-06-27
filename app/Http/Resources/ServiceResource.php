<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->idService,
            'nom_service' => $this->nomService,
            'code_instance' => $this->codeService,
            'instance' => new InstanceResource($this->instance)
        ];
    }
}
