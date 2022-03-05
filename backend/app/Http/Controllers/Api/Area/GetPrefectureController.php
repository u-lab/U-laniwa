<?php

namespace App\Http\Controllers\Api\Area;

use App\Enums\Prefecture;
use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class GetPrefectureController extends Controller
{
    /**
     *  国コードから都道府県レベルのjsonファイルを返すController
     *
     * @return JsonResponse
     */
    public function __invoke(int $countryId): JsonResponse
    {

        $prefectureEnum = Prefecture::cases();
        $prefectures = array_map(fn (Prefecture $prefectureCode): array => [
            'prefecture_code' => $prefectureCode, //名前がスネークケースなのはDBの都合
            'name' => $prefectureCode->label(),
        ], $prefectureEnum);
        switch ($countryId) {
            case 0: //外国
                $prefectures = array_shift($prefectures); //配列の先頭(その他だけ取り出す)
                break;
            case 81: //日本
                array_shift($prefectures); //配列の先頭を取り出した配列がそのまま残る
                break;
            default:
                $prefectures = array_shift($prefectures); //配列の先頭(その他だけ取り出す)

        }

        return  response()->json($prefectures);
    }
}