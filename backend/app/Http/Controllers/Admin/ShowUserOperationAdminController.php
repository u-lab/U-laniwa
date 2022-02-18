<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowUserOperationAdminController extends Controller
{
    public function __invoke()
    {
        return view('admin.userOperation', []);
    }
}