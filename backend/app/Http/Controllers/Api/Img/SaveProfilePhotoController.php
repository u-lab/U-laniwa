<?php

namespace App\Http\Controllers\Api\Img;

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
        \Log::debug($request);
        $validateRule = ['file' => 'required | mimes:jpeg,png,bmp,gif',];
        $this->validate($request, $validateRule);
        $path = $request->file->store('images/user'); // storage/app/imagesフォルダに保存
        return   response()->json([
            'path' => $path,
        ]);
    }
}