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
 * 未ログインで閲覧できるページ
 */
Route::get('/', function () {
    return view('welcome');
});


/**
 * ログインで閲覧できるページ
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');



    Route::middleware(['administrator'])->group(function () {
        /**
         * 管理者関連
         */
        //管理者ページ
        Route::get('/administrator', HomeAdminController::class)->name('home');
        Route::get('/administrator/notification', NotificationBroadcasterAdminController::class)->name('notification');
        Route::get('/administrator/package', PackageAdminController::class)->name('package');
        Route::get('/administrator/role_rank', Role_rankAdminController::class)->name('role');

        //パッケージ名前系
        Route::post('/administrator/settings/packages/create',  [ManagePackagesController::class, "create"])->name('createPackages');
        Route::post('/administrator/settings/packages/update',  [ManagePackagesController::class, "update"])->name('updatePackages');
        Route::post('/administrator/settings/packages/delete',  [ManagePackagesController::class, "delete"])->name('deletePackages');
        //パッケージジャンル
        Route::post('/administrator/settings/packages/genre/create',  [GenrePackagesController::class, "create"])->name('createPackagesGenre');
        Route::post('/administrator/settings/packages/genre/update',  [GenrePackagesController::class, "update"])->name('updatePackagesGenre');
        Route::post('/administrator/settings/packages/genre/delete',  [GenrePackagesController::class, "delete"])->name('deletePackagesGenre');

        //packageNERまわり
        Route::post('/statistics/settings/named_entity/package/create',  [NamedEntityStatisticsController::class, "packagesCreate"])->name('createPackageNamedEntity');
        Route::post('/statistics/settings/named_entity/package/update',  [NamedEntityStatisticsController::class, "packagesUpdate"])->name('updatePackageNamedEntity');
        Route::post('/statistics/settings/named_entity/package/delete',  [NamedEntityStatisticsController::class, "packagesDelete"])->name('deletePackageNamedEntity');

        //お知らせまわり
        Route::post('/administrator/settings/osirase/create',  [OsiraseController::class, "create"])->name('createOsirase');
        Route::post('/administrator/settings/osirase/update',  [OsiraseController::class, "update"])->name('updateOsirase');
        Route::post('/administrator/settings/osirase/delete',  [OsiraseController::class, "delete"])->name('deleteOsirase');

        //リリースノートまわり
        Route::post('/administrator/settings/releasenote/create',  [ReleasenoteController::class, "create"])->name('createReleasenote');
        Route::post('/administrator/settings/releasenote/update',  [ReleasenoteController::class, "update"])->name('updateReleasenote');
        Route::post('/administrator/settings/releasenote/delete',  [ReleasenoteController::class, "delete"])->name('deleteReleasenote');

        //ユーザーロールまわり
        Route::post('/administrator/settings/user/role/create',  [User_roleController::class, "create"])->name('createUser_role');
        Route::post('/administrator/settings/user/role/update',  [User_roleController::class, "update"])->name('updateUser_role');
        Route::post('/administrator/settings/user/role/delete',  [User_roleController::class, "delete"])->name('deleteUser_role');

        //ユーザーランクまわり
        Route::post('/administrator/settings/user/rank/create',  [User_rankController::class, "create"])->name('createRUser_rank');
        Route::post('/administrator/settings/user/rank/update',  [User_rankController::class, "update"])->name('updateRUser_rank');
        Route::post('/administrator/settings/user/rank/delete',  [User_rankController::class, "delete"])->name('deleteRUser_rank');
    });
});