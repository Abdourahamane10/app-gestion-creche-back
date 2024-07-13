<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->idSection,
            'code_section' => $this->codeSection,
            'nom_section' => $this->nomSection,
            'employes' => EmployeResource::collection($this->employes)
        ];
    }
}
