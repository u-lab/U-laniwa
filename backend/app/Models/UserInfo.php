<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'birth_day',
        'last_name',
        'first_name',
        'grade',
        'university_meta',
        'company_meta',
        'faculty_id',
        'u_u_major_id',
        'gender',
        'live_area_id',
        'birth_area_id',
        'group_affiliation',
        'is_dark_mode',
        'is_publish_birth_day',
        'status',
        'github_id',
        'line_name',
        'slack_name',
        'discord_name',
        'hobbies',
        'interests',
        'motto',
    ];

    /**
     * バリデーションルール
     *
     * @var array
     */
    public static $rules = array();

    /**
     * 初期値設定
     * @var array
     */
    protected $attributes = [
        "is_publish_birth_day" => true,
        "is_dark_mode" => false,
    ];

    /**
     * Enumキャスト
     *
     * @var array
     */
    protected $casts = [
        'gender' => Gender::class,
        'grade' => Grade::class,
    ];

    /**
     * 日付の登録(format使えるために)
     *
     * @var array
     */
    protected $dates = ['birth_day'];

    /**
     * ユーザーを繋ぐ
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'user_id')->withDefault();
    }
    /**
     * 専攻をつなぐ
     *
     * @return BelongsTo
     */
    public function uuMajor(): BelongsTo
    {
        return $this->belongsTo(UUMajor::class)->withDefault();
    }
    /**
     * 在住地域をつなぐ
     *
     * @return BelongsTo
     */
    public function liveArea(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'foreign_key', 'live_area_id')->withDefault();
    }
    /**
     * 出身地域をつなぐ
     *
     * @return BelongsTo
     */
    public function birthArea(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'foreign_key', 'birth_area_id')->withDefault();
    }
}