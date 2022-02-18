<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        "representative_id", "name", "description",  "thumbnail", "place_of_activity", "start_date", "end_date", "created_at", "updated_at"
    ];

    public static $rules = array();
}
