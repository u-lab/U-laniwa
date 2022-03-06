<?php

declare(strict_types=1);

namespace App\Http\Controllers\user;

use App\Enums\Country;
use App\Enums\Prefecture;
use App\Enums\Gender;
use App\Enums\Grade;
use App\Enums\UserTimelineGenre;
use App\Enums\UUFaculty;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Project;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserLink;
use App\Models\UserRole;
use App\Models\UserTimeline;
use App\Models\UUMajor;
use Auth;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShowIndividualUserController extends Controller
{
    /** @var Gate*/
    private $gate;
    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }
    /**
     * 個別のユーザー情報ページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(int $user_id): View|Factory
    {
        /**
         * @var mixed $user
         * @property int $id
         * @property int $user_id
         * @property string $birth_day — 誕生日
         * @property string|null $last_name — 姓
         * @property string $first_name — 名
         * @property string|null $description — 自己紹介
         * @property int $is_udai — 宇大かそうでないか
         * @property int|null $u_u_major_id
         * @property mixed|null $university_meta — 大学情報
         * @property mixed|null $company_meta — 企業情報
         * @property int $live_area_id
         * @property int $birth_area_id
         * @property int $is_dark_mode — ダークモードにするか？
         * @property int $is_publish_birth_day — 誕生日公開するか？
         * @property int $is_graduate — 卒業したか？
         * @property string $status — ひとこと(GitHubのstatusと同じ)
         * @property string|null $github_id — GitHubのid
         * @property string|null $line_name — LINEでのユーザー名
         * @property string|null $slack_name — Slackでのユーザー名
         * @property string|null $discord_name — Discordでのユーザー名
         * @property string|null $hobbies — 趣味
         * @property string|null $interests — 興味
         * @property string|null $motto — 座右の銘
         * @property int $grade
         * @property int $gender
         * @property string $birth_area
         * @property string $live_area
         * @property string $live_area
         * @property string $profession
         * @property string $user_role
         */
        $user = DB::table('user_infos')
            ->where('user_id', $user_id)
            ->join('users', 'user_infos.user_id', '=', 'users.id')
            ->leftJoin('u_u_majors', 'user_infos.u_u_major_id', '=', 'u_u_majors.id')
            ->select('users.id', 'users.name', 'users.profile_photo_path', 'users.user_role_id', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.status', 'user_infos.grade', 'user_infos.gender', 'user_infos.university_meta', 'user_infos.company_meta', 'user_infos.birth_area_id', 'user_infos.live_area_id', 'user_infos.group_affiliation', 'user_infos.is_publish_birth_day', 'user_infos.birth_day', 'user_infos.hobbies', 'user_infos.interests', 'user_infos.motto', 'user_infos.slack_name', 'user_infos.discord_name', 'user_infos.line_name', 'user_infos.github_id', 'u_u_majors.name as uu_major', 'u_u_majors.faculty_id as uu_faculty')
            ->first();

        $userAreas = Area::whereIn('id', [$user->birth_area_id, $user->live_area_id])->get();
        // 在住と出身が同じだった場合、返り値1つなので
        /** @var Area */
        $userBirthArea = $userAreas->first(fn (Area $area) => $area->id === $user->birth_area_id);
        /** @var Area */
        $userLiveArea = $userAreas->first(fn (Area $area) => $area->id === $user->live_area_id);
        // userにbirthとliveプロパティを追加
        $user->birth_area = $userBirthArea->prefecture_code == null ?  "-" : $userBirthArea->prefecture_code->label()  . $userBirthArea->municipality;
        $user->live_area = $userLiveArea->prefecture_code == null ?  "-" : $userLiveArea->prefecture_code->label() . $userLiveArea->municipality;

        // ユーザーロール取得
        $userRole = UserRole::where('id', $user->user_role_id)->first();
        $user->user_role = $userRole->name;
        /** @var UserLink */
        $links = UserLink::where('user_id', $user_id)->get();


        /** @var Project */
        $projects = DB::table('project_belongeds')
            ->where('user_id', $user_id)
            ->join('projects', 'project_belongeds.project_id', '=', 'projects.id')
            ->get();

        /** @var UserTimeline */
        $events = UserTimeline::where('user_id', $user_id)
            ->orderBy('start_date', 'asc')
            ->get();

        /** @var UserInfo */
        $relatedUsers = DB::table('user_infos')
            ->where('grade', $user->grade)
            ->join('users', 'user_infos.user_id', '=', 'users.id')
            ->leftJoin('u_u_majors', 'user_infos.u_u_major_id', '=', 'u_u_majors.id')
            ->select('users.name', 'users.profile_photo_path', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.user_id', 'user_infos.grade', 'user_infos.u_u_major_id', 'user_infos.university_meta', 'user_infos.company_meta', 'u_u_majors.name as uu_major', 'u_u_majors.faculty_id as uu_faculty')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        /**
         * enumを用いて学部・学年・性別・国・都道府県・タイムラインのジャンル・関連ユーザを取得
         */
        $user->uu_faculty = $user->uu_faculty == null ? "" : UUFaculty::from($user->uu_faculty)->label();
        $user->grade = Grade::from($user->grade)->label();
        $user->gender = Gender::from($user->gender)->label();
        foreach ($events as $event) {
            $event->genreName = $event->genre->label();
        }

        /**
         * userにprofessionメソッドを追加
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
            $user->profession = $user->uu_faculty . " " . $user->uu_major;
        } else {
            //この場合は存在しないはずだがエラーになるのは困るので空文字
            $user->profession = '';
        }

        /**
         * relatedUserにprofessionメソッドを追加
         * 社会人→会社名＋役職
         * 他大生→学名＋学部＋学科
         * 宇大生→学部＋学科
         * (宇大生から社会人になった場合、宇大のデータが残っている可能性が否めないので、それ防止のために先に社会人から条件分岐させている)
         */
        foreach ($relatedUsers as $relatedUser) {
            if ($relatedUser->company_meta) {
                $company_meta = json_decode($relatedUser->company_meta);
                $relatedUser->profession = $company_meta->company_name . "/" . $company_meta->position;
            } else if ($relatedUser->university_meta) {
                $university_meta = json_decode($relatedUser->university_meta);
                $relatedUser->profession = $university_meta->university . "/" . $university_meta->faculty . "/" . $university_meta->major;
            } else if ($relatedUser->uu_faculty) {
                /**
                 * enumを用いて学部を取得
                 */
                $relatedUser->uu_faculty =  UUFaculty::from($relatedUser->uu_faculty)->label();
                $relatedUser->profession = $relatedUser->uu_faculty . "/" . $relatedUser->uu_major;
            } else {
                //この場合は存在しないはずだがエラーになるのは困るので空文字
                $relatedUser->profession = '';
            }
        }

        /**
         * 正規表現を用いて誕生日のフォーマットを変更
         */
        preg_match_all('/[1-9]\d?/', $user->birth_day, $matches, PREG_PATTERN_ORDER, 4);
        $user->birth_day = implode('/', $matches[0]);

        return view('user.individual', [
            'gate' => $this->gate,
            'user' => $user,
            'links' => $links,
            'projects' => $projects,
            'events' => $events,
            'relatedUsers' => $relatedUsers,
        ]);
    }
}
