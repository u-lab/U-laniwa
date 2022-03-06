<?php

namespace App\Http\Middleware;

use App\Facades\Auth;
use App\Models\UserInfo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

/**
 * 初期アクセス時に実行
 * 新規登録時にユーザー情報がなければ、ユーザー情報を必ず入力させる
 */
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

        // ユーザー情報があるとき
        if (UserInfo::where('user_id', $user->id)->exists()) {
            return $next($request);
        }

        // ユーザー情報がないときに許可するパス
        $whiteListUrls = [
            route('userEdit'), // 編集
            route('userInfoUpdate'), // 更新
        ];

        //ユーザー情報がなく、アクセスしているページが user/edit でなければリダイレクト
        if (!in_array($request->url(), $whiteListUrls)) {
            return redirect(route('userEdit'));
        }

        return $next($request);
    }
}
