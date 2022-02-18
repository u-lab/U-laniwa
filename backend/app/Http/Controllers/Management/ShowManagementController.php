<?php

declare(strict_types=1);

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowManagementController extends Controller
{
    public function __invoke()
    {
        return view('management.index', []);
    }
}