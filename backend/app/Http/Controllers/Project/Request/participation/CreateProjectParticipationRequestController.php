<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project\Request\participation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateProjectParticipationRequestController extends Controller
{
    public function __invoke()
    {
        return redirect('/project/' . '$project_id' . '/request/participation', []);
    }
}