<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
            'img' => 'required | mimes:jpeg,png,bmp,gif',
            'name' => 'required | string | max:255',
            'lastName' => 'required | string | max:255',
            'firstName' => 'required | string | max:255',
            'gender' => 'required | integer',
            'birthDay' => 'required | date',
            // TODO: フロントで実装チェックしてから確認
            'isPublishBirthDay' => 'required | in:0,1',
            'grade' => 'required | integer | digits_between:1,2',
            'companyName' => 'string | max:255',
            'position' => 'string | max:255',
            'UUMajor' => 'integer | digits_between:1,2',
            'university' => 'string | max:255',
            'faculty' => 'string | max:255',
            'major' => 'string | max:255',
            'groupAffiliation' => 'string | max:255',
            'birthCountry' => 'required | integer | in:0,81',
            'birthPrefecture' => 'required | integer',
            'birthMunicipalityId' => 'required | integer',
            'liveCountry' => 'required | integer | in:0,81',
            'livePrefecture' => 'required | integer',
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
        return redirect('/user/edit');
    }
}