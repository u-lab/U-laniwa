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
            'timelineId' => 'int',
            'timelineTitle' => 'required|string|max:255',
            'timelineDescription' => 'nullable|max:1000',
            'timelineGenreId' => 'required|integer',
            'timelineStartDate' => 'required|date',
            'timelineStartDate' => 'nullable|date',
        ];
        $this->validate($request, $validateRule);
        /**
         * 必須のデータ
         * @var array<string,mixed>
         */
        $timelineDate = [
            'title' => $request->timelineTitle,
            'genre' => $request->timelineGenreId,
            'start_date' => $request->timelineStartDate,
            'user_id' => Auth::id(),
        ];
        /**
         * 必須じゃない項目の処理
         */
        $request->timelineDescription != null ? $timelineDate = array_merge($timelineDate, ['description' => $request->timelineDescription,]) : "";
        $request->timelineEndDate != null ? $timelineDate = array_merge($timelineDate, ['end_date' => $request->timelineEndDate,]) : "";
        /**無かったら作る、あったら更新する方式 */
        UserTimeline::updateOrCreate(
            ['id' => $request->timelineId],
            $timelineDate
        );
        return redirect('/user/edit#timelineTable');
    }
}
