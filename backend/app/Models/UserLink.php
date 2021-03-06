<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLink extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id", "url", "title", "description",
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
}