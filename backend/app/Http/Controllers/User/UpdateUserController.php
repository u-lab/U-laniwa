<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function __invoke()
    {
        return redirect('/user/edit');
    }
}