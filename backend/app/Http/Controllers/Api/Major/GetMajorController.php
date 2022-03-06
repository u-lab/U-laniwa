<?php

namespace App\Http\Controllers\Api\Major;

use App\Http\Controllers\Controller;
use App\Models\UUMajor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetMajorController extends Controller
{
    /**
     *  都道府県コードから該当する市区町村のデータを入れたjsonファイルを返すController
     *
     * @return JsonResponse
     */
    public function __invoke(int $facultyId): JsonResponse
    {
        $majors = UUMajor::where('faculty_id', $facultyId)->get();
        return  response()->json($majors);
    }
}