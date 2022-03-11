<?php

namespace App\Http\Middleware;

use Closure;
use LDAP\Result;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->header('Authorization') != 'Bearer ' . config('app.apiKey')) {
            return response()->json([
                "success" => false,
                "error" => "Bad Authorization"
            ]);
        }
        //passa alla pagina successiva
        return $next($request);
    }
}
