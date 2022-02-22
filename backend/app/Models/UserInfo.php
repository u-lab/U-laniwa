<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'uu_major_id',
        'gender',
        'lived_country_id',
        'lived_prefecture_id',
        'lived_municipality_id',
        'birth_country_id',
        'birth_prefecture_id',
        'birth_municipality_id',
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
     * @return HasOne
     */
    public function uuMajor(): HasOne
    {
        return $this->hasOne(UUMajor::class)->withDefault();
    }
    /**
     * 地域をつなぐ
     *
     * @return HasOne
     */
    public function area(): HasOne
    {
        return $this->hasOne(Area::class)->withDefault();
    }
}