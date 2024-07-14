<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nomEmploye' => ['string', 'required', 'max:50'],
            'prenomEmploye' => ['string', 'required', 'max:50'],
            'telephoneEmploye' => ['string', 'max:20'],
            'emailEmploye' => ['email', 'required', 'max:30'],
            'adresseEmploye' => ['string', 'max:45'],
            'passwordEmploye' => ['string', 'required', 'max:30'],
            'nationalityEmploye' => ['string', 'max:50'],
            'dateNaissanceEmploye' => ['date'],
            'sexeEmploye' => ['string', 'required', 'max:1'],
            'dateEmbaucheEmploye' => ['date'],
            'photoEmploye' => ['string', 'max:200'],
            'idFonction' => ['integer', 'required', 'min:0'],
            'idSection' => ['integer', 'required', 'min:0']
        ];
    }
}
