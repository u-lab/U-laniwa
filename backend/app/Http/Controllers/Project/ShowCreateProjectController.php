<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowCreateProjectController extends Controller
{
    public function __invoke()
    {
        return view('project.create', []);
    }
}