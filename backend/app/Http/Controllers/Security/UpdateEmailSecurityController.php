<?php

declare(strict_types=1);

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UpdateEmailSecurityController extends Controller
{
    /**
     * セキュリティページのメールを更新するコントローラー
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
            'email' => 'required | email',
            'email_confirm' => 'required | email | same:email',
        ];
        $this->validate($request, $validateRule);
        /** emailを更新 */
        User::where('id', $userId)->update(['email' => $request->email]);
        return redirect('/security');
    }
}
