<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseTrait;

class AuthController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\POST(
     *     path="/api/loginSociete",
     *     summary="Connecte l'utilisateur à la base de données de la société qui lui correspond",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"codeSociete", "codeService"},
     *             @OA\Property(property="codeSociete", type="string", description="Code de connexion de la société"),
     *             @OA\Property(property="codeService", type="string", description="Code de connexion du service de     l'utiilisateur")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Retourne un message qui indique que la connexion à la base de données a réussi",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Connexion à la base de données réussie!"),
     *             @OA\Property(property="data", type="string", example="")
     *         )
     *     )
     * )
     *
     * @return void
     */
    public function loginSociete()
    {
        return $this->successResponse("", "Connexion à la base de données réussie!");
    }
}
