<?php
namespace App\Http\Middleware;
use Closure;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\IntegranteController;
use Illuminate\Support\Facades\Auth;

class CargarUsuarioYDependencia
{
    public function handle($request, Closure $next)
    {
        $usuario = Auth::user();

        // Cargar la dependencia asociada al usuario
        if ($usuario) {
            $usuario->load('dependencia');
        }

        return $next($request);
    }
}
