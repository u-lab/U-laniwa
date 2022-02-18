<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",  "name", "description",
    ];

    public static $rules = array();
    //時間カラムの自動挿入無効化
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;



    /// 主キーカラム名を指定
    protected $primaryKey = 'id';
    /// オートインクリメント無効化
    public $incrementing = false;
}
