<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;
    protected $fillable = [
        "name", "country_id",
    ];

    public static $rules = array();

    //時間カラムの自動挿入無効化
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;
}