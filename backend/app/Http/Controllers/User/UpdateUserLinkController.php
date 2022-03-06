<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserLink;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class UpdateUserLinkController extends Controller
{
    /**
     * ユーザーリンクを更新するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(Request $request): Redirector|RedirectResponse
    {
        /**
         * バリデーション
         */
        $validateRule = [
            'linkId' => 'nullable | int',
            'linkTitle' => 'required|string|max:255',
            'linkDescription' => 'nullable | string | max:1000',
            'linkUrl' => 'required | url',
        ];
        $this->validate($request, $validateRule);


        /**無かったら作る、あったら更新する方式 */
        UserLink::updateOrCreate(
            ['id' => $request->linkId],
            [
                'title' => $request->linkTitle,
                'url' => $request->linkUrl,
                'user_id' => Auth::id(),
                'description' => $request->linkDescription ?? null,
            ],
        );
        return redirect('/user/edit#linkTable');
    }
}
