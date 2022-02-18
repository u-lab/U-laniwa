<?php

declare(strict_types=1);

namespace App\Http\Controllers\statistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowProjectStatisticController extends Controller
{
    public function __invoke()
    {
        return view('statistic.project', []);
    }
}