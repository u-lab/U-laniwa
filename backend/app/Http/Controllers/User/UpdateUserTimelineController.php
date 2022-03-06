<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserTimeline;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class UpdateUserTimelineController extends Controller
{
    /**
     * タイムラインを更新するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(Request $request): Redirector|RedirectResponse
    {
        /**
         * バリデーション
         */
        $validateRule = [
            'timelineId' => 'nullable|int',
            'timelineTitle' => 'required|string|max:255',
            'timelineDescription' => 'nullable| string |max:1000',
            'timelineGenreId' => 'required|integer',
            'timelineStartDate' => 'required|date',
            'timelineEndDate' => 'nullable|date',
        ];
        $this->validate($request, $validateRule);

        /**無かったら作る、あったら更新する方式 */
        UserTimeline::updateOrCreate(
            ['id' => $request->timelineId],
            [
                'title' => $request->timelineTitle,
                'genre' => $request->timelineGenreId,
                'start_date' => $request->timelineStartDate,
                'end_date' => $request->timelineEndDate ?? null,
                'user_id' => Auth::id(),
                'description' => $request->timelineDescription ?? null,
            ],
        );
        return redirect('/user/edit#timelineTable');
    }
}
