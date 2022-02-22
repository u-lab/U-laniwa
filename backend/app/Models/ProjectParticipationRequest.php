<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectParticipationRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        "project_id", "user_id", "comment", "created_at", "updated_at"
    ];

    /**
     * バリデーションルール
     *
     * @var array
     */
    public static $rules = array();

    /**
     * プロジェクトをつなぐ
     *
     * @return HasOne
     */
    public function project(): HasOne
    {
        return $this->hasOne(Project::class)->withDefault();
    }
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