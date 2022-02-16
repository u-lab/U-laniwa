<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_qualification extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id", "name", "date_of_acquisition", "description"
    ];

    public static $rules = array();
    //時間カラムの自動挿入無効化
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;
}