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

/**
 * 【SecurityClearance:level0】
 * 未ログインで閲覧できるページ
 */
Route::get('/', function () {
    return view('level0/top');
});
Route::get('/privacyPolicy', function () {
    return view('level0/privacyPolicy');
});

Route::get('/credit', function () {
    return view('level0/credit');
});
Route::get('/releaseNote', function () {
    return view('level0/releaseNote');
});
Route::get('/terms', function () {
    return view('level0/terms');
});
Route::get('/privacyPolicy', function () {
    return view('level0/privacyPolicy');
});
Route::get('/aboutThisSite', function () {
    return view('level0/aboutThisSite');
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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/home ');
})->name('home_redirect');


/**
 * ログインで閲覧できるページ
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    /**
     * 【SecurityClearance:level1】
     * 外部ユーザーレベル
     */

    Route::get('/home', Controller::class)->name('home'); //ホームページ
    Route::get('/calender', Controller::class)->name('calender'); //ホームページ
    Route::get('/mediaKit', Controller::class)->name('mediaKit'); //メディアキットページ
    Route::get('/groupRules', Controller::class)->name('groupRules'); //U-lab団体規約
    Route::get('/statistics', Controller::class)->name('statistics'); //統計情報




    //ユーザー情報閲覧(level1では各種制限があるがここではできないので、中身の制御はbladeで行う)
    Route::get('/user', Controller::class)->name('users'); //全ユーザーのリスト
    Route::get('/user/{user_id}', Controller::class)->name('user'); //各ユーザー情報

    //ユーザー検索
    Route::post('/user/search/{words}', Controller::class)->name('searchpost'); //検索リクエスト
    Route::get('/user/search/{words}', Controller::class)->name('search'); //{words}の検索結果

    //ユーザー詳細検索
    //ここはクエリ文字列を使う(複数になる可能性があるので ?faculty=1&gender=1みたいな)
    Route::post('/user/detailedSearch/', Controller::class)->name('detailedSearchPost'); //検索リクエスト
    Route::get('/user/detailedSearch/', Controller::class)->name('detailedSearch'); //検索結果

    //ユーザー情報編集(ログイン中のユーザーが対象になるため間にid不要)
    Route::get('/user/edit', Controller::class)->name('userEdit'); //ユーザー閲覧
    Route::post('/user/edit/update', Controller::class)->name('userEditUpdate'); //ユーザー閲覧

    //パスワード要求
    Route::middleware(['password.confirm'])->group(function () {
        //セキュリティページ(パスワード変更など)
        Route::get('/security', ShowSecurityPageController::class)->name('security');
        Route::post('/security/update', Controller::class)->name('securityUpdate');
    });

    //手続きページ
    Route::get('/procedure', Controller::class)->name('procedure');
    Route::post('/procedure/withdraw', Controller::class)->name('withdraw'); //退部処理
    //level1権限権限では「引退」（OB・OGになる）ことはできないのでlevel3以降の権限対象で記載


    //プロジェクト周り
    Route::get('/project', Controller::class)->name('project'); //プロジェクト一覧
    Route::get('/project/{project_id}', Controller::class)->name('project');   //各プロジェクト情報

    //プロジェクト編集(編集はプロジェクトメンバーであれば可能なので、level1のコーナーで用意)
    Route::get('/project/{project_id}/edit', Controller::class)->name('project');   //プロジェクト編集ページ
    Route::post('/project/{project_id}/update', Controller::class)->name('projectUpdate');   //プロジェクト更新
    Route::post('/project/{project_id}/delete', Controller::class)->name('projectDelete');   //プロジェクト削除
    //プロジェクトのお知らせ
    Route::post('/project/{project_id}/notice/create', Controller::class)->name('noticeProject'); //新規
    Route::post('/project/{project_id}/notice/update', Controller::class)->name('noticeProject'); //更新
    Route::post('/project/{project_id}/notice/delete', Controller::class)->name('noticeSystem'); //削除
    //プロジェクト参加リクエスト
    Route::get('/project/{project_id}/request/participation ', Controller::class)->name('participationRequest'); //参加リクエスト文などを入力するページ
    Route::post('/project/{project_id}/request/participation', Controller::class)->name('participationRequestPost');
    Route::get('/project/{project_id}/request/participation/done', Controller::class)->name('participationRequestDone'); //送信完了ページ
    Route::get('/project/{project_id}/participationRequest', Controller::class)->name('participationRequestDone'); //送信完了ページ






    Route::middleware(['level2'])->group(function () {
        /**
         * 【SecurityClearance:level2】
         * 仮入部レベル
         */

        //お知らせ
        Route::get('/notice', Controller::class)->name('noticeAll'); //一覧
        Route::get('/notice/{genre_id}', Controller::class)->name('noticeGenre'); //ジャンルごとの一覧





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
                Route::post('/procedure/retire', Controller::class)->name('retire'); //引退処理

                //プロジェクト新規作成
                Route::get('/project/create', Controller::class)->name('projectCreate');
                Route::post('/project/create', Controller::class)->name('projectCreatePost');






                Route::middleware(['level5'])->group(function () {
                    /**
                     * 【SecurityClearance:level5】運営レベル
                     */

                    //運営以上の管理者権限用ページ
                    Route::get('/admin/userOperation', Controller::class)->name('userOperation'); //ユーザー編集
                    Route::get('/admin/userRole', Controller::class)->name('Role'); //ユーザー権限編集
                    //仮入部→本入部へ
                    Route::get('/admin/temporaryEntranceToMain', Controller::class)->name('temporaryEntranceToMain');
                    Route::post('/admin/temporaryEntranceToMain', Controller::class)->name('temporaryEntranceToMain');


                    //運営用ページ
                    Route::get('/management/home', Controller::class)->name('managementHome');

                    //運営からのお知らせ
                    Route::get('/management/notice', Controller::class)->name('managementHome'); //お知らせ一覧
                    Route::post('/management/notice/create', Controller::class)->name('noticeManagement'); //新規
                    Route::post('/management/notice/update', Controller::class)->name('noticeManagement'); //更新
                    Route::post('/management/notice/delete', Controller::class)->name('noticeManagement'); //削除




                    Route::middleware(['level6'])->group(function () {
                        /**
                         * 【SecurityClearance:level6】
                         * システム管理者レベル
                         */

                        //システム運用者用ページ
                        Route::get('/systemAdministrator/notice', Controller::class)->name('systemAdministratorHome');

                        //システムからのお知らせ
                        Route::get('/systemAdministrator/notice', Controller::class)->name('systemAdministratorHome'); //お知らせ一覧
                        Route::post('/systemAdministrator/notice/create', Controller::class)->name('noticeSystemAdministrator'); //新規
                        Route::post('/systemAdministrator/notice/update', Controller::class)->name('noticeSystemAdministrator'); //更新
                        Route::post('/systemAdministrator/notice/delete', Controller::class)->name('noticeSystemAdministrator'); //削除




                        Route::middleware(['level7'])->group(function () {
                            /**
                             * 【SecurityClearance:level7】
                             * 代表レベル
                             */

                            //代表用ページ
                            Route::get('/representative/home', Controller::class)->name('representativeHome');

                            Route::post('/admin/changeGeneration', Controller::class)->name('retire'); //世代交代処理
                            Route::post('/admin/taiseiHokan', Controller::class)->name('retire'); //サークル削除処理

                        });
                    });
                });
            });
        });
    });
});