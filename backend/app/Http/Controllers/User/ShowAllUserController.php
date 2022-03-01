<?php

declare(strict_types=1);

namespace App\Http\Controllers\user;

use App\Enums\Grade;
use App\Enums\UUFaculty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\UserInfo;
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
            ->join('users', 'user_infos.user_id', '=', 'users.id')
            ->leftJoin('u_u_majors', 'user_infos.u_u_major_id', '=', 'u_u_majors.id')
            ->select('users.id', 'users.name', 'users.profile_photo_path', 'user_infos.status', 'user_infos.grade', 'u_u_majors.name as uu_major', 'u_u_majors.faculty_id as uu_faculty')
            ->orderBy('grade', 'asc') //後ほど学部順で使うため
            ->get();

        $listedUsers = [];
        foreach ($users as $user) {
            /**
             * enmuを用いて学部を取得
             */
            $user->uu_faculty = $user->uu_faculty == null ? "" : UUFaculty::from($user->uu_faculty)->label();

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