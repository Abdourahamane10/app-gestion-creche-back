<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Factory;
use Illuminate\Http\Response;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;


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
     *             @OA\Property(property="codeService", type="string", description="Code de connexion du service de l'utilisateur")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Retourne un message qui indique que la connexion à la base de données a réussi",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Demande de connexion approuvée!"),
     *             @OA\Property(property="data", type="object",
     *                 example={
     *                     "database": "nom_de_la_base_de_donnees",
     *                     "tableAuth": "nom_de_la_table_d'authentification"
     *                 },
     *                 @OA\Property(property="database", type="string", description="Nom de la base de données utilisée"),
     *                 @OA\Property(property="tableAuth", type="string", description="Nom de la table d'authentification utilisée")
     *            )
     *         )
     *     )
     * )
     *
     * @return void
     */
    public function loginSociete()
    {
        //Récupération de la base instance
        $database = request()->has('database') ? request('database') : null;
        //Récupération de la table d'authentification
        $tableAuth = request()->has('tableAuth') ? request('tableAuth') : null;
        return $this->successResponse(['database' => $database, 'tableAuth' => $tableAuth], "Demande de connexion approuvée!");
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        //La présence des champs 'database' et 'tableAuth' est déjà faite dans le middleware InitConnexion
        if (!request()->has(['email', 'password'])) {
            return $this->errorResponse("Champs email ou password manquant!");
        }

        $credentials = request(['email', 'password']);
        $database = request('database');
        $tableAuth = request('tableAuth');

        if (!$token = auth($tableAuth)->attempt($credentials)) {
            return $this->errorResponse('Utilisateur inconnu!', Response::HTTP_UNAUTHORIZED);
            //return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->successResponse($this->respondWithToken($token), "Connexion réussi avec succès!");

        //return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $ttl = config('jwt.ttl', 60);
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            //'expires_in' => auth()->factory()->getTTL() * 60
            'expires_in' => $ttl * 60
        ];
    }
}
