<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // Ottieni i ruoli consentiti per l'accesso da qualche parte
        $allowedRoles = [1]; // Elenca i ruoli consentiti qui

        if ($user && $user->roles()->whereIn('role_id', $allowedRoles)->exists()) {
            return $next($request);
        }

        return redirect()->route('guest.dashboard')->with('error', 'Accesso non consentito.');
    }
}
