<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->idEmploye,
            'nom' => $this->nomEmploye,
            'prenom' => $this->prenomEmploye,
            'telephone' => $this->telephoneEmploye,
            'email' => $this->email,
            'adresse' => $this->adresseEmploye,
            'nationality' => $this->nationalityEmploye,
            'dateNaissance' => $this->dateNaissanceEmploye,
            'sexe' => $this->sexeEmploye,
            'dateEmbauche' => $this->dateEmbaucheEmploye,
            'photo' => $this->photoEmploye,
            'fonction' => new FonctionResource($this->fonction),
            'section' => new SectionResource($this->section)
        ];
    }
}
