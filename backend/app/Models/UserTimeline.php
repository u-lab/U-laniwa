<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\UserTimelineGenre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserTimeline extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id", "title", "description", "genre", "start_date", "end_date",
    ];

    /**
     * バリデーションルール
     *
     * @var array
     */
    public static $rules = array();
    /**
     * 日付の登録(format使えるために)
     *
     * @var array
     */
    protected $dates = ['start_date', 'end_date'];
    /**
     * ユーザーをつなぐ
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * Enumキャスト
     *
     * @var array
     */
    protected $casts = [
        'genre' => UserTimelineGenre::class,
    ];
}