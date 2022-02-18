<?php

declare(strict_types=1);

namespace App\Http\Controllers\Representative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowRepresentativeController extends Controller
{
    public function __invoke()
    {
        return view('representative.index', []);
    }
}