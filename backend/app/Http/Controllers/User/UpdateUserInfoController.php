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

class UpdateUserInfoController extends Controller
{
    /**
     * ユーザー情報を更新するコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(Request $request): Redirector|RedirectResponse
    {
        $validateRule = [
            'profilePhotoPath' => 'required | string',
            'userName' => 'required | string | max:255',
            'lastName' => 'required | string | max:255',
            'firstName' => 'required | string | max:255',
            'gender' => 'required | integer | not_in:0',
            'birthDay' => 'required | date',
            'isPublishBirthDay' => 'required | in:0,1',
            'grade' => 'required | integer | digits_between:1,2 | not_in:0',
            'companyName' => 'string | max:255',
            'position' => 'string | max:255',
            'uuMajorId' => 'integer | digits_between:1,2',
            'university' => 'string | max:255',
            'faculty' => 'string | max:255',
            'major' => 'string | max:255',
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
            // 'email' => 'required | email',
            // 'password' => 'required | string | alpha_num | between:6,255',
            // 'user_role_id' => 'required | integer',
            // 'invited_id' => 'required | integer',
            // 'retired_at' => 'date',
        ];
        $this->validate($request, $validateRule);
        $userId = Auth::id();

        /**
         * ユーザーテーブルの更新
         */
        User::where('id', $userId)->update([
            'profile_photo_path' => $request->profilePhotoPath,
            'name' => $request->userName,
        ]);

        /**
         * ユーザーインフォの更新
         */

        /**ユーザーインフォ必須を取り込み */
        $userInfoData = [
            'last_name' => $request->lastName,
            'first_name' => $request->firstName,
            'birth_day' => $request->birthDay,
            'is_publish_birth_day' => $request->isPublishBirthDay,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'birth_area_id' => $request->birthMunicipalityId,
            'live_area_id' => $request->liveMunicipalityId,
        ];

        /**
         * 宇大の学部学科or大学名学部学科or会社名役職の条件分岐
         */
        if ($request->company) {
            $userInfoData = array_merge($userInfoData, [
                'company_meta' => json_encode(
                    [
                        'company_name' => $request->company,
                        'position' => $request->position,
                    ]
                )
            ]);
        } else if ($request->university) {
            $userInfoData = array_merge($userInfoData, [
                'university_meta' => json_encode(
                    [
                        'university' => $request->originUniversity,
                        'faculty' => $request->originFaculty,
                        'major' => $request->originMajor,
                    ]
                )
            ]);
        } else if ($request->uuMajorId) {
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
        UserInfo::where('user_id', $userId)->updateOrCreate(
            ['id' => $request->linkId],
            $userInfoData
        );
        return redirect('/user/edit');
    }
}
