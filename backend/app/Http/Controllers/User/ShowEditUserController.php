<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Enums\Country;
use App\Enums\UUFaculty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowEditUserController extends Controller
{
    /**
     * ユーザー情報の編集ページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {

        /**
         * DBに格納していないEnum型のデータを取得する
         */
        //国
        //都道府県、市区町村に関しては動的に取得する(api.php参照)
        $countryEnum = Country::cases();
        $countries =  array_map(fn (Country $countryCode): array => [
            'country_code' => $countryCode, //国コード 名前がスネークケースなのはDBの都合
            'name' => $countryCode->label(), //名前
        ], $countryEnum);

        //学部
        $uuFacultyEnum = UUFaculty::cases();
        $uuFaculties =  array_map(fn (UUFaculty $id): array => [
            'id' => $id, //学部id(学科の取得に用いる)
            'name' => $id->label(), //学部名
        ], $uuFacultyEnum);
        return view('user.edit', ['countries' => $countries, 'uuFaculties' => $uuFaculties]);
    }
}