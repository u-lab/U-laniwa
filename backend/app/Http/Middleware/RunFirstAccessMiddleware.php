<?php

namespace App\Http\Middleware;

use App\Facades\Auth;
use App\Models\UserInfo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class RunFirstAccessMiddleware
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
        if (UserInfo::where('user_id', $user->id)->exists() == "") {
            return redirect('/user/edit');
        }

        return $next($request);
    }
}