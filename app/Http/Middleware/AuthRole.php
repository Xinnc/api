<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = User::where('remember_token', $request->bearerToken())->first();
        throw_if(!$user, new ApiException(403, 'Forbidden for you'));
        throw_if($user->role != $role, new ApiException(403, 'Forbidden for you'));
        $request->user = $user;
        return $next($request);
    }
}
