<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UU_major extends Model
{
    use HasFactory;
    protected $fillable = [
        "name", "faculty_id",
    ];

    public static $rules = array();

    //時間カラムの自動挿入無効化
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;
}