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
        //ユーザー情報入力済みのユーザーを引っ張り出す
        $users = UserInfo::with('user:id,name,profile_photo_path')->get([
            'id',
            'status',
            'grade',
            'u_u_major_id',
        ]);


        $listedUsers = [];
        foreach ($users as $user) {
            //ユーザー情報のu_u_major_idの情報をもとにUUMajorを取得
            $uuMajor =  UUMajor::find($user->u_u_major_id);
            if ($uuMajor) {
                $user->uuMajor = $uuMajor->name;
                $user->uuFaculty = $uuMajor->faculty_id->label();
            } else {
                $user->uuMajor = "";
                $user->uuFaculty = "";
            }
            //学年ごとに仕分け
            if (!array_key_exists($user->grade->label(), $listedUsers)) {
                $listedUsers[$user->grade->label()] = [];
                $listedUsers[$user->grade->label()] = array_merge($listedUsers[$user->grade->label()], [$user]);
            } else {
                $listedUsers[$user->grade->label()] = array_merge($listedUsers[$user->grade->label()], [$user]);
            }
        }
        \Log::debug($listedUsers);




        return view('user.index', ["listedUsers" => $listedUsers]);
    }
}