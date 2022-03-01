<?php

namespace App\Http\Controllers\Api\Area;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetMunicipalityController extends Controller
{
    /**
     *  都道府県コードから該当する市区町村のデータを入れたjsonファイルを返すController
     *
     * @return JsonResponse
     */
    public function __invoke(int $prefectureId): JsonResponse
    {
        $municipalities = Area::where('prefecture_code', $prefectureId)->get();
        return  response()->json($municipalities);
    }
}