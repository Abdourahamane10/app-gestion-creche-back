<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->idParent,
            'nom' => $this->nomParent,
            'prenom' => $this->prenomParent,
            'telephone' => $this->telephoneParent,
            'email' => $this->email,
            'adresse' => $this->adresseParent,
            'nationality' => $this->nationalityParent,
            'dateNaissance' => $this->dateNaissanceParent,
            'profession' => $this->professionParent,
            'sexe' => $this->sexeParent,
            'photo' => $this->photoParent
        ];
    }
}
