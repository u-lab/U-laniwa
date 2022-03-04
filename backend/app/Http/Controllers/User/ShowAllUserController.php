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
            ->select('users.id', 'users.name', 'users.profile_photo_path',   'user_infos.company_meta', 'user_infos.university_meta', 'user_infos.last_name', 'user_infos.first_name', 'user_infos.grade', 'u_u_majors.name as uu_major', 'u_u_majors.faculty_id as uu_faculty')
            ->orderBy('grade', 'asc') //後ほど学部順で使うため
            ->get();


        $listedUsers = [];
        foreach ($users as $user) {



            /**
             * 社会人→会社名＋役職
             * 他大生→学名＋学部＋学科
             * 宇大生→学部＋学科
             * (宇大生から社会人になった場合、宇大のデータが残っている可能性が否めないので、それ防止のために先に社会人から条件分岐させている)
             */

            if ($user->company_meta) {
                $company_meta = json_decode($user->company_meta);
                $user->profession = $company_meta->company_name . " " . $company_meta->position;
            } else if ($user->university_meta) {
                $university_meta = json_decode($user->university_meta);
                $user->profession = $university_meta->university . " " . $university_meta->faculty . " " . $university_meta->major;
            } else if ($user->uu_faculty) {
                /**
                 * enmuを用いて学部を取得
                 */
                $user->uu_faculty =  UUFaculty::from($user->uu_faculty)->label();
                $user->profession = $user->uu_faculty . " " . $user->uu_major;
            } else {
                //この場合は存在しないはずだがエラーになるのは困るので空文字
                $user->profession = '';
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
