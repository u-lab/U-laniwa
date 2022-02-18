<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteProjectController extends Controller
{
    public function __invoke()
    {
        return redirect('/project');
    }
}