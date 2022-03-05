<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Country;
use App\Enums\Prefecture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        "country_code", "prefecture_code", "municipality_code", "municipality"
    ];

    /**
     * バリデーションルール
     *
     * @var array
     */
    public static $rules = array();

    //時間カラムの自動挿入無効化
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;


    /**
     * Enumキャスト
     *
     * @var array
     */
    protected $casts = [
        'country_code' => Country::class,
        'prefecture_code' => Prefecture::class,
    ];
}