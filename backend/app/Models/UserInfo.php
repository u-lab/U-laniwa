<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'faculty_id',
        'major_id',
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
        'languages',
        'motto',
    ];

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
}