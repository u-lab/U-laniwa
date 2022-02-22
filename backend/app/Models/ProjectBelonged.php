<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectBelonged extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id", "project_id", "created_at", "updated_at"
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
    public function userInviteCode(): HasOne
    {
        return $this->hasOne(User::class)->withDefault();
    }

    /**
     * プロジェクトをつなぐ
     *
     * @return HasOne
     */
    public function project(): HasOne
    {
        return $this->hasOne(Project::class)->withDefault();
    }
}