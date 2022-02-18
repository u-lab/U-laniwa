<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable = [
        "genre", "date", "title", "description", "created_at", "updated_at"
    ];

    public static $rules = array();
}