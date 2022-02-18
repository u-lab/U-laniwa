<?php

declare(strict_types=1);

namespace App\Http\Controllers\timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowAllTimelineController extends Controller
{
    public function __invoke()
    {
        return view('timeline.index', []);
    }
}