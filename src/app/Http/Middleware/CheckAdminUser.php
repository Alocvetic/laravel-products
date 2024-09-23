<?php

namespace App\Http\Middleware;

use App\Exceptions\Auth\AccessRoleUserException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminUser
{
    /**
     * @throws AccessRoleUserException
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user->tokenCan('role:admin')) {
            throw new AccessRoleUserException();
        }

        return $next($request);
    }
}
