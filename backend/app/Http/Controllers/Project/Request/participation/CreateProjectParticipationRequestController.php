<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project\Request\participation;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreateProjectParticipationRequestController extends Controller
{
    /**
     * Undocumented function
     *
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        return redirect('/project/' . '$project_id' . '/request/participation');
    }
}