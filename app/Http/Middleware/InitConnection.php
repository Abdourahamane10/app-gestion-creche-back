<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\SwitchDatabase;
use Symfony\Component\HttpFoundation\Response;


class InitConnection
{
    use ApiResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('*/loginSociete')) {
            return $next($request);
        }
        if (!$request->has(['database', 'tableAuth'])) {
            return $this->errorResponse("Base de données ou table d'authentification inconnu!");
        }
        $database = $request->input('database');
        $tableAuth = $request->input('tableAuth');
        //On initialise la connexion à la base de données de l'utilisateur
        //On utilise la fonction initialiserConnexion du middleware SwitchDatabase
        $switchDatabaseMiddleware = app(SwitchDatabase::class);
        $switchDatabaseMiddleware->initialiserConnection($database);

        return $next($request);
    }
}
