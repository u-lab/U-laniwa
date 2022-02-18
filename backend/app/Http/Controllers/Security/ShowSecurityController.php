<?php

declare(strict_types=1);

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowSecurityController extends Controller
{
    public function __invoke()
    {
        return view('security.index', []);
    }
}