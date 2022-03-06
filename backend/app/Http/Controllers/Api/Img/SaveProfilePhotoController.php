<?php

namespace App\Http\Controllers\Api\Area;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SaveProfilePhotoController extends Controller
{
    /**
     *  都道府県コードから該当する市区町村のデータを入れたjsonファイルを返すController
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $validateRule = ['img' => 'required | mimes:jpeg,png,bmp,gif',];
        $this->validate($request, $validateRule);
        $path = $request->img->store('images'); // storage/app/imagesフォルダに保存
        return   response()->json([
            'path' => $path,
        ]);
    }
}