<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\NoticeGenre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable = [
        "genre", "date", "title", "description", "created_at", "updated_at"
    ];

    /**
     * バリデーションルール
     *
     * @var array
     */
    public static $rules = array();

    /**
     * Enumキャスト
     *
     * @var array
     */
    protected $casts = [
        'genre' => NoticeGenre::class,
    ];


    /**
     * 日付の登録(format使えるために)
     *
     * @var array
     */
    protected $dates = ['date'];
}