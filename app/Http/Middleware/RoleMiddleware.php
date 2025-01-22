<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$authorizedRoles): Response
    {
        $role = Auth::check() ? Auth::user()->role->value : '';

        $authorizedRoles[] = Role::ADMIN->value;

        if(!in_array($role, $authorizedRoles)) {
            return Redirect::route('login');
        }
        
        return $next($request);
    }
}
