<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParentsRequest extends FormRequest
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
            'nomParent' => ['string', 'required', 'max:50'],
            'prenomParent' => ['string', 'required', 'max:50'],
            'telephoneParent' => ['string', 'max:20'],
            'email' => ['email', 'required', 'max:30'],
            'adresseParent' => ['string', 'max:45'],
            'password' => ['string', 'required', 'max:45'],
            'nationalityParent' => ['string', 'max:50'],
            'dateNaissanceParent' => ['date'],
            'sexeParent' => ['string', 'required', 'max:1'],
            'professionParent' => ['string', 'max:45'],
            'photoParent' => ['string', 'max:200']
        ];
    }
}
