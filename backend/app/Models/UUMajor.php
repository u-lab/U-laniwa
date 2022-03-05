<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\UUFaculty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UUMajor extends Model
{
    use HasFactory;
    protected $fillable = [
        "name", "faculty_id",
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
        'faculty_id' => UUFaculty::class,
    ];
}
