<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_participation_request extends Model
{
    use HasFactory;
    protected $fillable = [
        "project_id", "user_id", "comment", "created_at", "updated_at"
    ];

    public static $rules = array();
}