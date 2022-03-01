<?php

declare(strict_types=1);

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UUMajor;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ShowAllUserController extends Controller
{
    /**
     * ユーザー一覧を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        //ユーザー情報入力済みのユーザーを引っ張り出す
        /** @var UserInfo|Collection */
        $userInfos = UserInfo::with('user:id,name,profile_photo_path')->get([
            'id',
            'status',
            'grade',
            'u_u_major_id',
        ]);


        $listedUsers = [];
        foreach ($userInfos as $userInfo) {
            //ユーザー情報のu_u_major_idの情報をもとにUUMajorを取得

            /** @var  UUMajor|null */
            $uuMajor =  UUMajor::find($userInfo->u_u_major_id);
            if ($uuMajor) {
                $userInfo->uuMajor = $uuMajor->name;
                $userInfo->uuFaculty = $uuMajor->faculty_id->label();
            } else {
                $userInfo->uuMajor = "";
                $userInfo->uuFaculty = "";
            }
            //学年ごとに仕分け
            if (!array_key_exists($userInfo->grade->label(), $listedUsers)) {
                $listedUsers[$userInfo->grade->label()] = [];
                $listedUsers[$userInfo->grade->label()] = array_merge($listedUsers[$userInfo->grade->label()], [$userInfo]);
            } else {
                $listedUsers[$userInfo->grade->label()] = array_merge($listedUsers[$userInfo->grade->label()], [$userInfo]);
            }
        }
        \Log::debug($listedUsers);




        return view('user.index', ["listedUsers" => $listedUsers]);
    }
}