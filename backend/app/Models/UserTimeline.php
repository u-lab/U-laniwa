<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
     * ユーザーをつなぐ
     *
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class)->withDefault();
    }
}