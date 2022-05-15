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
        "representative_id",
        "name",
        "description",
        "thumbnail",
        "place_of_activity",
        "start_date",
        "end_date",
    ];

    /**
     * バリデーションルール
     *
     * @var array
     */
    public static $rules = array();

    /**
     * 日付の登録(format使えるために)
     *
     * @var array
     */
    protected $dates = ['start_date', 'end_date'];

    /**
     * 初期値設定
     * @var array
     */
    protected $attributes = [
        "thumbnail" => "images/default/default_project_thumbnail.png",
    ];

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
