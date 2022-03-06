<?php

use App\Http\Controllers\Api\Area\GetCountryController;
use App\Http\Controllers\Api\Area\GetMunicipalityController;
use App\Http\Controllers\Api\Area\GetPrefectureController;
use App\Http\Controllers\Api\Img\SaveProfilePhotoController;
use App\Http\Controllers\Api\Major\GetMajorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/get/area/prefecture/{country_id}', GetPrefectureController::class)->name('getPrefecture');
Route::get('/get/area/municipality/{prefecture_id}', GetMunicipalityController::class)->name('getMunicipality');
Route::get('/get/major/{faculty_id}', GetMajorController::class)->name('getMajor');
Route::post('/img/upload/profile_photo', SaveProfilePhotoController::class)->name('SaveProfilePhoto');