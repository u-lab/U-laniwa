<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        "representative_id", "name", "description",  "thumbnail", "place_of_activity", "start_date", "end_date", "created_at", "updated_at"
    ];

    /**
     * バリデーションルール
     *
     * @var array
     */
    public static $rules = array();


    /**
     * プロジェクト進捗取得
     *
     * @return HasMany
     */
    public function projectProgress(): HasMany
    {
        return $this->hasMany(ProjectProgress::class);
    }
    /**
     * プロジェクト参加者取得
     *
     * @return HasMany
     */
    public function projectBelonged(): HasMany
    {
        return $this->hasMany(ProjectBelonged::class);
    }
    /**
     * プロジェクト参加リクエスト取得
     *
     * @return HasMany
     */
    public function projectParticipationRequest(): HasMany
    {
        return $this->hasMany(ProjectParticipationRequest::class);
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