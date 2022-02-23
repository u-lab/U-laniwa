<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'birth_day',
        'last_name',
        'first_name',
        'description',
        'grade',
        'is_udai',
        'university_meta',
        'company_meta',
        'faculty_id',
        'u_u_major_id',
        'gender',
        'live_area_id',
        'birth_area_id',
        'is_dark_mode',
        'is_publish_birth_day',
        'is_graduate',
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
     * Enumキャスト
     *
     * @var array
     */
    protected $casts = [
        'gender' => Gender::class,
        'grade' => Grade::class,
    ];


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