<?php

declare(strict_types=1);

namespace App\Http\Controllers\user;

use App\Enums\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UUMajor;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ShowAllUserController extends Controller
{
    /**
     * ユーザー一覧を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        /**
         * ユーザー情報入力済みのユーザーを引っ張り出す(全ユーザーがユーザー情報入力しているとは限らず、入力まだのユーザーを表示したくないため)
         * withなどを用いてeloquentで取ろうと工夫したがどうにも要件を満たす結果が出せなかったのでsqlのjoinを利用した
         * join利用のためGradeでenum型にキャストされて帰ってこない！！！
         * @var User|UserInfo
         */
        $users = DB::table('user_infos')
            ->join('users', 'users.id', '=', 'user_infos.user_id')
            ->select('users.id', 'users.name', 'users.profile_photo_path', 'user_infos.status', 'user_infos.grade', 'user_infos.u_u_major_id',)
            ->orderBy('grade', 'asc') //後ほど学部順で使うため
            ->get();

        $listedUsers = [];
        foreach ($users as $user) {
            /**
             * ユーザー情報のu_u_major_idの情報をもとにUUMajorを取得
             */

            /** @var  UUMajor|null */
            $uuMajor =  UUMajor::find($user->u_u_major_id);
            if ($uuMajor) {
                $user->uuMajor = $uuMajor->name;
                $user->uuFaculty = $uuMajor->faculty_id->label();
            } else {
                $user->uuMajor = null;
                $user->uuFaculty = null;
            }

            /**
             * 学年ごとに仕分けする
             * （上のクエリで学部順に整列しているのでここでは取り出すだけで学部1年→2年..になる)
             */
            $gradeName = Grade::from($user->grade)->label(); //$user->grade->label()はDB::でクエリしたためできない
            if (!array_key_exists($gradeName, $listedUsers)) {
                $listedUsers[$gradeName] = [];
                $listedUsers[$gradeName] = array_merge($listedUsers[$gradeName], [$user]);
            } else {
                $listedUsers[$gradeName] = array_merge($listedUsers[$gradeName], [$user]);
            }
        }

        return view('user.index', ["listedUsers" => $listedUsers]);
    }
}