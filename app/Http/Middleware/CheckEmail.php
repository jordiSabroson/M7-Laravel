<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Agafem el valor email del web.php i comprovem que la petició POST sigui diferent a null.
        // Si ho és, seguim amb la petició, si no, redirigim amb el to_route a la ruta get del web.php d'error
        if ($request->email != null) {
            return $next($request);
        } else {
            return to_route("errorAcces.index");
        }
        
    }
}
