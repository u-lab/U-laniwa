<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
     * キャストする属性
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Project に所属している
     *
     * @return HasOne
     */
    public function projectBelonged(): HasOne
    {
        return $this->hasOne(ProjectBelonged::class, 'project_id', 'id');
    }
}
