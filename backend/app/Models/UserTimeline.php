<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTimeline extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id", "title", "description", "genre", "start_date", "end_date",
    ];

    public static $rules = array();
}