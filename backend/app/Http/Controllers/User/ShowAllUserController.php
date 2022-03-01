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

class ShowAllUserController extends Controller
{
    /**
     * ユーザー一覧を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        $users = User::with('UserInfo:id,status,u_u_major_id')->get([
            'id',
            'name',
            'profile_photo_path',
        ]);

        // $userInfos = UserInfo::with('user_id.user')->get();

        //ユーザー情報からu_u_major_idの情報をUUMajorにする
        foreach ($users as $user) {
            $uuMajor =  UUMajor::find($user->userInfo->u_u_major_id);
            \Log::debug($uuMajor);
            if ($uuMajor) {
                $user->userInfo->uuMajor = $uuMajor->name;
                $user->userInfo->uuFaculty = $uuMajor->faculty_id->label();
            } else {
                $user->userInfo->uuMajor = "";
                $user->userInfo->uuFaculty = "";
            }
            \Log::debug($user->userInfo->uuFaculty);
            \Log::debug($user->userInfo->uuMajor);
        }




        return view('user.index', ["users" => $users]);
    }
}