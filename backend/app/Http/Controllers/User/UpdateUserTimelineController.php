<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserTimeline;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UpdateUserTimelineController extends Controller
{
    /**
     * タイムラインを更新するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(Request $request): Redirector|RedirectResponse
    {
        // // バリデーション
        // $this->validate($request, Osirase::$rules);

        // $updateContent = [
        //     "title" => $request->title,
        //     "genre_id" => $request->osirase_genre_id,
        //     "description" => $request->description,
        //     "date" => $request->date,
        // ];

        // Osirase::create('id', $request->osirase_id)->update($updateContent);

        $validateRule = [
            'timelineId' => 'int',
            'timelineTitle' => 'required|string|max:255',
            'timelineDescription' => 'string|max:1000',
            'timelineGenreId' => 'required|integer',
            'timelineStartDate' => 'required|date',
            'timelineEndDate' => 'date',
        ];
        $this->validate($request, $validateRule);
        UserTimeline::updateOrCreate(
            ['id' => $request->timelineId],
            [
                'title' => $request->timelineTitle,
                'description' => $request->timelineDescription,
                'genre_id' => $request->timelineGenreId,
                'start_date' => $request->timelineStartDate,
                'end_date' => $request->timelineEndDate,
            ]
        );
        return redirect('/user/edit');
    }
}