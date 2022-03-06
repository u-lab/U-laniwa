<?php

declare(strict_types=1);

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UpdatePasswordSecurityController extends Controller
{
    /**
     * セキュリティページのパスワードを更新するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(Request $request): Redirector|RedirectResponse
    {
        $userId = Auth::id();
        /**
         * バリデーション
         */
        $validateRule = [
            'password' => 'required | string | alpha_num | between:6,255',
            'password_confirm' => 'required | string | same:password',
        ];
        $this->validate($request, $validateRule);
        /** passwordをハッシュ化 */
        $hashedPassword = Hash::make($request->password);
        /** passwordを更新 */
        User::where('id', $userId)->update(['password' => $hashedPassword]);
        return redirect('/home');
    }
}
