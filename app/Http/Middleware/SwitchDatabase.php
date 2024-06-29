<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Instance;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SwitchDatabase
{
    use ApiResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //On récupère la base de données à laquelle l'utilisateur essaie de se connecter
        $database = $this->resolveDtaBaseName($request);
        if (!$database) {
            return $this->errorResponse("Utilisateur inconnu!");
        }

        try {
            //On récupère la configuration actuelle pour la connexion à la base de données
            $config = config('database.connections.mysql_instanceClient');
            $config['database'] = $database;
            // On met à jour la configuration dans le fichier de configuration de l'application
            config(['database.connections.mysql_instanceClient' => $config]);
            DB::purge('mysql_instanceClient'); //On vide la connexion en cache si nécessaire
            DB::reconnect('mysql_instanceClient'); //On ferme l'ancienne connexion et on en ouvre une nouvelle connexion avec la nouvelle configuration
        } catch (ConnectionException $e) {
            return $this->errorResponse("Echec de la connexion à la base de données!", 500);
        }

        return $next($request);
    }

    /**
     * Fonction qui renvoie la bonne base de données correspondant à l'utilisateur qui essaie de se connecter
     *
     * @param Request $request
     * @return void
     */
    public function resolveDtaBaseName(Request $request)
    {
        if (!$request->has('codeSociete') || !$request->has('codeService')) {
            return $this->errorResponse('champs codeSociete ou champs codeService manquant!');
        }
        $database = "";
        $identifiants = $request->all();
        $codeSociete = $identifiants['codeSociete'];
        $codeService = $identifiants['codeService'];
        $instance = Instance::where('codeInstance', '=', $codeSociete)->whereHas('services', function ($query) use ($codeService) {
            $query->where('codeService', $codeService);
        })->first();
        if ($instance) {
            $database = $instance->nomInstance;
        }
        return $database;
    }
}
