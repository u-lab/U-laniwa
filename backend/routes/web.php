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
//【SecurityClearance:level0】
Route::get('/', function () {
    return view('level0/top');
});
Route::get('/privacyPolicy', function () {
    return view('level0/privacyPolicy');
});
Route::get('/contact', function () {
    return view('level0/contact');
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
 * ログイン後のリダイレクト
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/home ');
})->name('home_redirect');
/**
 * ログインで閲覧できるページ
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //【SecurityClearance:level1】

    Route::middleware(['level2'])->group(function () {
        Route::middleware(['level3'])->group(function () {
            Route::middleware(['level4'])->group(function () {
                Route::middleware(['level5'])->group(function () {
                    Route::middleware(['level6'])->group(function () {
                        Route::middleware(['level7'])->group(function () {
                        });
                    });
                });
            });
        });
    });
});