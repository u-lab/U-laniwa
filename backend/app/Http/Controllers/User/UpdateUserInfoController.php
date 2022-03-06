<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class UpdateUserInfoController extends Controller
{
    /**
     * ユーザー情報を更新するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(Request $request): Redirector|RedirectResponse
    {
        \Log::debug($request);
        $validateRule = [
            'profilePhotoPath' => 'required | string',
            'userName' => 'required | string | max:255',
            'lastName' => 'required | string | max:255',
            'firstName' => 'required | string | max:255',
            'birthDay' => 'required | date',
            'isPublishBirthDay' => ['regex:/(on|null)/'],
            'gender' => 'required | integer | not_in:0',
            'grade' => 'required | integer | digits_between:1,2 | not_in:0',

            'company' => 'nullable | string | max:255',
            'position' => 'nullable | string | max:255',

            'univRadio' => ['string', 'regex:/(uu|else)/'], //正規表現のパイプ使えないので配列に

            'uuMajorId' => 'integer | digits_between:1,2 | not_in:0',

            'university' => 'nullable | string | max:255',
            'faculty' => 'nullable | string | max:255',
            'major' => 'nullable | string | max:255',

            'groupAffiliation' => 'string | max:255',
            'birthMunicipalityId' => 'required | integer',
            'liveMunicipalityId' => 'required | integer',
            'hobbies' => 'string | max:255',
            'interests' => 'string | max:255',
            'motto' => 'string | max:255',
            'githubId' => 'string | max:255',
            'lineName' => 'string | max:255',
            'slackName' => 'string | max:255',
            'discordName' => 'string | max:255',
            'description' => 'string | max:255',
        ];
        $this->validate($request, $validateRule);

        /** @var User */
        $user = Auth::user();
        $userId = $user->id;

        /**
         * ユーザーテーブルの更新
         * 画像に関しては別でアップデートのため、デフォルトではnoChangeを付与することで回避
         */
        User::where('id', $userId)->update([
            'profile_photo_path' =>  $request->profilePhotoPath,
            'name' => $request->userName,
        ]);

        /**
         * ユーザーインフォの更新
         */

        /**ユーザーインフォ必須を取り込み */
        $userInfoData = [
            'user_id' => $userId,
            'last_name' => $request->lastName,
            'first_name' => $request->firstName,
            'birth_day' => $request->birthDay,
            'is_publish_birth_day' => $request->isPublishBirthDay == "on" ? 1 : 0,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'birth_area_id' => $request->birthMunicipalityId,
            'live_area_id' => $request->liveMunicipalityId,
        ];

        /**
         * 宇大の学部学科or大学名学部学科or会社名役職の条件分岐
         */
        if ($request->company != null && $request->grade >= 10) {
            $userInfoData = array_merge($userInfoData, [
                'company_meta' => json_encode(
                    [
                        'company_name' => $request->company,
                        'position' => $request->position,
                    ]
                )
            ]);
        } else if ($request->university != "" && $request->univRadio == "else") {
            $userInfoData = array_merge($userInfoData, [
                'university_meta' => json_encode(
                    [
                        'university' => $request->originUniversity,
                        'faculty' => $request->originFaculty,
                        'major' => $request->originMajor,
                    ]
                )
            ]);
        } else if ($request->uuMajorId != "" && $request->univRadio == "uu") {
            $userInfoData = array_merge($userInfoData, [
                'u_u_major_id' => $request->uuMajorId,
            ]);
        } else {
            //どれも無いなんてありえないが、不正すれば出来るので、エラーを出す
            abort(500);
        }

        /**
         * 必須でない項目
         */
        $request->groupAffiliation != null ? $userInfoData = array_merge($userInfoData, ['group_affiliation' => $request->groupAffiliation,]) : "";
        $request->hobbies != null ? $userInfoData = array_merge($userInfoData, ['hobbies' => $request->hobbies,]) : "";
        $request->interests != null ? $userInfoData = array_merge($userInfoData, ['interests' => $request->interests,]) : "";
        $request->motto != null ? $userInfoData = array_merge($userInfoData, ['motto' => $request->motto,]) : "";
        $request->githubId != null ? $userInfoData = array_merge($userInfoData, ['github_id' => $request->githubId,]) : "";
        $request->lineName != null ? $userInfoData = array_merge($userInfoData, ['line_name' => $request->lineName,]) : "";
        $request->slackName != null ? $userInfoData = array_merge($userInfoData, ['slack_name' => $request->slackName,]) : "";
        $request->discordName != null ? $userInfoData = array_merge($userInfoData, ['discord_name' => $request->discordName,]) : "";
        $request->status != null ? $userInfoData = array_merge($userInfoData, ['status' => $request->status,]) : "";

        /**ユーザーテーブルのアップデート */
        /**ユーザーインフォのアップデート */
        UserInfo::updateOrCreate(
            ['user_id' => $userId],
            $userInfoData
        );

        /**画像が変わり、かつデフォルト画像でなかったら古い画像のデータを消す */
        if ($request->profilePhotoPath != $user->profile_photo_path && $user->profilePhotoPath != "images/default/default_profile_photo.png") {
            Storage::delete('public/' . $user->profile_photo_path);
        }

        return redirect('/user/edit');
    }
}
