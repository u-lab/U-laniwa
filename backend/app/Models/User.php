<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'user_role_id',
        'invited_id',
        'retired_at',

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


    /**
     * バリデーションルール
     *
     * @var array
     */
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

    /**
     * 初期値設定
     * @var array
     */
    protected $attributes = [
        "profile_photo_path" => "img/default_profile_photo.png",
    ];


    /**
     * ユーザー情報とつなぐ用のやつ
     *
     * @return HasOne
     */
    public function userInfo(): HasOne
    {
        return $this->hasOne(UserInfo::class);
    }

    /**
     * 招待コードをつなぐ
     *
     * @return HasOne
     */
    public function userInviteCode(): HasOne
    {
        return $this->hasOne(UserInviteCode::class)->withDefault();
    }

    /**
     * ユーザーリンク取得
     *
     * @return HasMany
     */
    public function userLink(): HasMany
    {
        return $this->hasMany(UserLink::class);
    }
    /**
     * ユーザータイムライン取得
     *
     * @return HasMany
     */
    public function userTimeline(): HasMany
    {
        return $this->hasMany(UserTimeline::class);
    }
    /**
     * プロジェクトをつなぐ
     *
     * @return HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}