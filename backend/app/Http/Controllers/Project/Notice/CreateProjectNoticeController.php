<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateProjectNoticeController extends Controller
{
    public function __invoke()
    {
        return redirect('/project/' . '$project_id' . '/edit');
    }
}