<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProgress extends Model
{
    use HasFactory;
    protected $fillable = [
        "project_id", "date", "title", "description", "created_at", "updated_at"
    ];

    public static $rules = array();
}