<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityClearance
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     */
    public function level7($request, Closure $next, $guard = null)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->user_role_id >= 70 ? '' : abort(403);
        return $next($request);
    }
    public function level6($request, Closure $next, $guard = null)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->user_role_id >= 60 ? '' : abort(403);
        return $next($request);
    }
    public function level5($request, Closure $next, $guard = null)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->user_role_id >= 50 ? '' : abort(403);
        return $next($request);
    }
    public function level4($request, Closure $next, $guard = null)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->user_role_id >= 40 ? '' : abort(403);
        return $next($request);
    }
    public function level3($request, Closure $next, $guard = null)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->user_role_id >= 30 ? '' : abort(403);
        return $next($request);
    }
    public function level2($request, Closure $next, $guard = null)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->user_role_id >= 20 ? '' : abort(403);
        return $next($request);
    }
    public function level1($request, Closure $next, $guard = null)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->user_role_id >= 10 ? '' : abort(403);
        return $next($request);
    }
}