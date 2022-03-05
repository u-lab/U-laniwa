<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ShowHomeController;
use App\Http\Controllers\Management\Notice\CreateManagementNoticeController;
use App\Http\Controllers\Management\Notice\DeleteManagementNoticeController;
use App\Http\Controllers\Management\Notice\ShowManagementNoticeController;
use App\Http\Controllers\Management\Notice\UpdateManagementNoticeController;
use App\Http\Controllers\Management\ShowManagementController;
use App\Http\Controllers\Notice\ShowAllNoticeController;
use App\Http\Controllers\Notice\ShowPerGenreNoticeController;
use App\Http\Controllers\Procedure\DoRetireProcedureController;
use App\Http\Controllers\Procedure\DoWithDrawProcedureController;
use App\Http\Controllers\Procedure\ShowProcedureController;
use App\Http\Controllers\Project\CreateProjectController;
use App\Http\Controllers\Project\DeleteProjectController;
use App\Http\Controllers\Project\Notice\CreateProjectNoticeController;
use App\Http\Controllers\Project\Notice\DeleteProjectNoticeController;
use App\Http\Controllers\Project\Notice\UpdateProjectNoticeController;
use App\Http\Controllers\Project\Request\participation\CreateProjectParticipationRequestController;
use App\Http\Controllers\Project\Request\participation\ShowDoneProjectParticipationRequestController;
use App\Http\Controllers\Project\Request\participation\ShowProjectParticipationRequestController;
use App\Http\Controllers\Project\ShowEditProjectController;
use App\Http\Controllers\Project\ShowAllProcedureController;
use App\Http\Controllers\Project\ShowCreateProjectController;
use App\Http\Controllers\Project\ShowIndividualProjectController;
use App\Http\Controllers\Project\UpdateProjectController;
use App\Http\Controllers\Representative\ShowRepresentativeController;
use App\Http\Controllers\Security\UpdateSecurityController;
use App\Http\Controllers\System\Notice\CreateSystemNoticeController;
use App\Http\Controllers\System\Notice\DeleteSystemNoticeController;
use App\Http\Controllers\System\Notice\ShowSystemNoticeController;
use App\Http\Controllers\System\Notice\UpdateSystemNoticeController;
use App\Http\Controllers\System\ShowSystemController;
use App\Http\Controllers\Timeline\ShowProjectTimelineController;
use App\Http\Controllers\Timeline\ShowQualificationTimelineController;
use App\Http\Controllers\Timeline\ShowAllTimelineController;
use App\Http\Controllers\User\ShowAllUserController;
use App\Http\Controllers\User\ShowEditUserController;
use App\Http\Controllers\User\ShowIndividualUserController;
use App\Http\Controllers\User\UpdateUserController;
use App\Http\Controllers\Admin\DoChangeGenerationAdminController;
use App\Http\Controllers\Admin\DoTaiseiHokanAdminController;
use App\Http\Controllers\Admin\DoTemporaryEntranceToMainAdminController;
use App\Http\Controllers\Admin\ShowAdminController;
use App\Http\Controllers\Admin\ShowTemporaryEntranceToMainAdminController;
use App\Http\Controllers\Admin\ShowUserOperationAdminController;
use App\Http\Controllers\Admin\ShowUserRoleAdminController;
use App\Http\Controllers\DetailSearch\ShowUserDetailSearchController;
use App\Http\Controllers\Procedure\DoRegenerateInviteCodeController;
use App\Http\Controllers\Project\ShowAllProjectController;
use App\Http\Controllers\Security\ShowSecurityController;
use App\Http\Controllers\Security\UpdateEmailSecurityController;
use App\Http\Controllers\Security\UpdatePasswordSecurityController;
use App\Http\Controllers\Statistic\ShowAllStatisticController;
use App\Http\Controllers\Statistic\ShowProjectStatisticController;
use App\Http\Controllers\Statistic\ShowUserStatisticController;
use App\Http\Controllers\User\UpdateUserInfoController;
use App\Http\Controllers\User\UpdateUserLinkController;
use App\Http\Controllers\User\UpdateUserTimelineController;

/**
 * 【SecurityClearance:level0】
 * 未ログインで閲覧できるページ
 */
Route::get('/', function () {
    return view('top');
});

Route::get('/privacyPolicy', function () {
    return view('privacyPolicy');
});

Route::get('/credit', function () {
    return view('credit');
});
Route::get('/releaseNote', function () {
    return view('releaseNote');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/aboutThisSite', function () {
    return view('aboutThisSite');
});
Route::get('/teapot', function () {
    abort(418);
});

/**
 * 未完成ページは   abort(423)にしておく
 */


/**
 * ログイン後のリダイレクト
 */
Route::middleware(['auth:sanctum', 'verified', 'first'])->get('/dashboard', function () {
    return redirect('/dashboard');
})->name('home_redirect');


/**
 * ログインで閲覧できるページ
 */
Route::middleware(['auth:sanctum', 'verified', 'first'])->group(function () {
    /**
     * 【SecurityClearance:level1】
     * 外部ユーザーレベル
     */
    Route::get('/home', ShowHomeController::class)->name('home'); //ホームページ

    Route::get('/calender', function () {
        return view('calender');
    });
    // Route::get('/mediaKit', function () {
    //     return view('mediaKit');
    // });
    // Route::get('/groupRules', function () {
    //     return view('groupRules');
    // });


    //ユーザー情報閲覧(level1では各種制限があるがここではできないので、中身の制御はbladeで行う)
    Route::get('/user', ShowAllUserController::class)->name('users'); //全ユーザーのリスト
    //ユーザー情報編集(ログイン中のユーザーが対象になるため間にid不要)
    Route::get('/user/edit', ShowEditUserController::class)->name('userEdit'); //ユーザー閲覧
    Route::get('/user/{user_id}', ShowIndividualUserController::class)->name('user'); //各ユーザー情報
    Route::post('/user/edit/update/userInfo/', UpdateUserInfoController::class)->name('userInfoUpdate'); //ユーザー閲覧
    Route::post('/user/edit/update/userTimeline', UpdateUserTimelineController::class)->name('userTimelineUpdate'); //ユーザー閲覧
    Route::post('/user/edit/update/userLink', UpdateUserLinkController::class)->name('userLinkUpdate'); //ユーザー閲覧


    //ユーザータイムライン
    Route::get('/timeline', ShowAllTimelineController::class)->name('timelineAll');
    //タイムラインは今後増やしていく予定
    // Route::post('/timeline/qualification',  ShowQualificationTimelineController::class)->name('timelineGetQualification');
    // Route::post('/timeline/project',  ShowProjectTimelineController::class)->name('timelineJoinedProject');
    // Route::post('/timeline/u-lab', Controller::class)->name('timelineJoinedU-lab');

    // Route::get('/statistic', ShowAllStatisticController::class)->name('statistics'); //統計情報
    // Route::get('/statistic/user', ShowProjectStatisticController::class)->name('statisticsUsers'); //ユーザー統計情報
    // Route::get('/statistic/project', ShowUserStatisticController::class)->name('statisticsProjects'); //プロジェクト統計情報

    //ユーザー検索
    // Route::get('/search/user/{words}',  ShowUserDetailSearchController::class)->name('search'); //検索リクエスト

    //ユーザー詳細検索
    //ここはクエリ文字列を使う(複数になる可能性があるので ?faculty=1&gender=1みたいな)
    // Route::get('/detailSearch/user', ShowUserDetailSearchController::class)->name('detailedSearchPost'); //検索リクエスト


    //パスワード要求
    Route::middleware(['password.confirm'])->group(function () {
        //セキュリティページ(パスワード変更など)
        Route::get('/security', ShowSecurityController::class)->name('security');
        Route::post('/security/update/password', UpdatePasswordSecurityController::class)->name('securityPasswordUpdate');
        Route::post('/security/update/email', UpdateEmailSecurityController::class)->name('securityEmailUpdate');
    });

    //手続きページ
    Route::get('/procedure', ShowProcedureController::class)->name('procedure');
    //下記は誤操作のリスクが高いため、リンクはセキュリティページに配置
    Route::post('/procedure/withdraw', DoWithDrawProcedureController::class)->name('withdraw'); //退部処理
    //level1権限権限では「引退」（OB・OGになる）ことはできないのでlevel3以降の権限対象で記載


    //プロジェクト周り
    // Route::get('/project', ShowAllProjectController::class)->name('project'); //プロジェクト一覧
    // Route::get('/project/{project_id}', ShowIndividualProjectController::class)->name('project');   //各プロジェクト情報

    //プロジェクト編集(編集はプロジェクトメンバーであれば可能なので、level1のコーナーで用意)
    // Route::get('/project/{project_id}/edit', ShowEditProjectController::class)->name('project');   //プロジェクト編集ページ
    //createは一つ上の権限にあり
    // Route::post('/project/{project_id}/update', UpdateProjectController::class)->name('projectUpdate');   //プロジェクト更新
    // Route::post('/project/{project_id}/delete', DeleteProjectController::class)->name('projectDelete');   //プロジェクト削除
    //プロジェクトのお知らせ
    // Route::post('/project/{project_id}/notice/create', CreateProjectNoticeController::class)->name('noticeProject'); //新規←ここはプロジェクト編集に相乗りできるのでgetページ不要
    // Route::post('/project/{project_id}/notice/update', UpdateProjectNoticeController::class)->name('noticeProject'); //更新
    // Route::post('/project/{project_id}/notice/delete', DeleteProjectNoticeController::class)->name('noticeSystem'); //削除
    //プロジェクト参加リクエスト
    // Route::get('/project/{project_id}/request/participation ', ShowProjectParticipationRequestController::class)->name('participationRequest'); //参加リクエスト文などを入力するページ
    // Route::post('/project/{project_id}/request/participation', CreateProjectParticipationRequestController::class)->name('participationRequestPost');
    // Route::get('/project/{project_id}/request/participation/done', ShowDoneProjectParticipationRequestController::class)->name('participationRequestDone'); //送信完了ページ






    Route::middleware(['level2'])->group(function () {
        /**
         * 【SecurityClearance:level2】
         * 仮入部レベル
         */

        //お知らせ
        // Route::get('/notice', ShowAllNoticeController::class)->name('noticeAll'); //一覧
        // Route::get('/notice/{genre_id}', ShowPerGenreNoticeController::class)->name('noticeGenre'); //ジャンルごとの一覧





        Route::middleware(['level3'])->group(function () {
            /**
             * 【SecurityClearance:level3】
             * OB・OGレベル
             */






            Route::middleware(['level4'])->group(function () {
                /**
                 * 【SecurityClearance:level4】
                 * 本入部レベル
                 */
                //下記は誤操作のリスクが高いため、リンクはセキュリティページに配置
                Route::post('/procedure/retire', DoRetireProcedureController::class)->name('retire'); //引退処理
                //下記は手続きページ
                Route::post('/procedure/regenerateInviteCode', DoRegenerateInviteCodeController::class)->name('regenerateInviteCode'); //招待コード生成処理

                //プロジェクト新規作成
                // Route::get('/project/create', ShowCreateProjectController::class)->name('projectCreate');
                // Route::post('/project/create', CreateProjectController::class)->name('projectCreatePost');






                Route::middleware(['level5'])->group(function () {
                    /**
                     * 【SecurityClearance:level5】運営レベル
                     */

                    //運営以上の管理者権限用ページ
                    // Route::get('/admin', ShowAdminController::class)->name('admin'); //adminページ
                    // Route::get('/admin/userOperation', ShowUserOperationAdminController::class)->name('userOperation'); //ユーザー編集
                    // Route::get('/admin/userRole', ShowUserRoleAdminController::class)->name('Role'); //ユーザー権限編集
                    //仮入部→本入部へ
                    // Route::get('/admin/temporaryEntranceToMain', ShowTemporaryEntranceToMainAdminController::class)->name('temporaryEntranceToMain');
                    // Route::post('/admin/temporaryEntranceToMain', DoTemporaryEntranceToMainAdminController::class)->name('temporaryEntranceToMain');


                    //運営用ページ
                    // Route::get('/management', ShowManagementController::class)->name('managementHome');

                    //運営からのお知らせ
                    // Route::get('/management/notice', ShowManagementNoticeController::class)->name('managementHome'); //お知らせ一覧
                    // Route::post('/management/notice/create', CreateManagementNoticeController::class)->name('noticeManagement'); //新規
                    // Route::post('/management/notice/update', UpdateManagementNoticeController::class)->name('noticeManagement'); //更新
                    // Route::post('/management/notice/delete', DeleteManagementNoticeController::class)->name('noticeManagement'); //削除




                    Route::middleware(['level6'])->group(function () {
                        /**
                         * 【SecurityClearance:level6】
                         * システム管理者レベル
                         */

                        //システム運用者用ページ
                        // Route::get('/system', ShowSystemController::class)->name('systemHome');

                        //システムからのお知らせ
                        // Route::get('/system/notice', ShowSystemNoticeController::class)->name('systemHome'); //お知らせ一覧
                        // Route::post('/system/notice/create', CreateSystemNoticeController::class)->name('createNoticeDystem'); //新規
                        // Route::post('/system/notice/update', UpdateSystemNoticeController::class)->name('updateNoticeDystem'); //更新
                        // Route::post('/system/notice/delete', DeleteSystemNoticeController::class)->name('deleteNoticeDystem'); //削除




                        Route::middleware(['level7'])->group(function () {
                            /**
                             * 【SecurityClearance:level7】
                             * 代表レベル
                             */

                            //代表用ページ
                            // Route::get('/representative', ShowRepresentativeController::class)->name('representativeHome');

                            // Route::post('/admin/changeGeneration', DoChangeGenerationAdminController::class)->name('retire'); //世代交代処理
                            // Route::post('/admin/taiseiHokan', DoTaiseiHokanAdminController::class)->name('retire'); //サークル削除処理

                        });
                    });
                });
            });
        });
    });
});