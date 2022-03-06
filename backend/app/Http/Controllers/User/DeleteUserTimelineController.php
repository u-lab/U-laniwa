<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserTimeline;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class DeleteUserTimelineController extends Controller
{
    /**
     * ユーザータイムラインを削除するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(Request $request): Redirector|RedirectResponse
    {

        $request->validate([
            'userTimelineId' => 'required|integer',
        ]);
        //無駄なuser_idを付けているのは、万が一悪意あるユーザーが他のユーザーのtimeline idに偽装した時を防ぐため
        UserTimeline::where('id', $request->userTimelineId)->where('user_id', Auth::id())->delete();
        return redirect('/user/edit#timelineTable');
    }
}