<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseTrait;

class AuthController extends Controller
{
    use ApiResponseTrait;


    public function loginSociete()
    {
        return $this->successResponse("", "Connexion à la base de données réussie!");
    }
}
