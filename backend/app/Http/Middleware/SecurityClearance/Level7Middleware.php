<?php

namespace App\Http\Middleware;

use App\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class Level7Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // 未認証はありえない。未認証はエラー発生。
        if ($user === null) throw new UnauthorizedException();

        $user->user_role_id >= 70 ? '' : abort(403);
        return $next($request);
    }
}
