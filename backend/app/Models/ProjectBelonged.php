<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectBelonged extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id", "project_id", "created_at", "updated_at"
    ];

    public static $rules = array();
}
