<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class)->withDefault();
    }
    /**
     * ユーザーをつなぐ
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}