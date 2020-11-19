<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();

        if (!$user->isAdmin()) {
            abort(403);
        }

        return $next($request);
    }
}
