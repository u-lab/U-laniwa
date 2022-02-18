<?php

declare(strict_types=1);

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowIndividualUserController extends Controller
{
    public function __invoke()
    {
        return view('user.individual', []);
    }
}