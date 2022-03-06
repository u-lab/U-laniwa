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
        \Log::debug($request);
        /**
         * バリデーション
         */
        $validateRule = [
            'linkId' => 'int',
            'linkTitle' => 'required|string|max:255',
            'linkDescription' => 'max:1000',
            'linkUrl' => 'required|url',
        ];
        $this->validate($request, $validateRule);
        /**
         * 必須のデータ
         * @var array<string,mixed>
         */
        $linkDate = [
            'title' => $request->linkTitle,
            'user_id' => Auth::id(),
        ];
        /**
         * 必須じゃない項目の処理
         */
        $request->linkDescription != null ? $linkDate = array_merge($linkDate, ['description' => $request->linkDescription,]) : "";
        /**無かったら作る、あったら更新する方式 */
        UserLink::updateOrCreate(
            ['id' => $request->linkId],
            $linkDate
        );
        return redirect('/user/edit#linkTable');
    }
}