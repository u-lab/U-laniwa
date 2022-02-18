<?php

declare(strict_types=1);

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateSecurityController extends Controller
{
    public function __invoke()
    {
        return redirect('/security');
    }
}