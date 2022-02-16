<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_accessed_at',
        'birth_day',
        'retired_at',
        'last_name',
        'first_name',
        'description',
        'user_role_id',
        'grade_id',
        'is_udai',
        'university_meta',
        'faculty_id',
        'major_id',
        'gender_id',
        'lived_country_id',
        'lived_prefecture_id',
        'lived_municipality_id',
        'birth_country_id',
        'birth_prefecture_id',
        'birth_municipality_id',
        'invited_id',
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


    public static $rules = array();

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}