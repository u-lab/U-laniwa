<?php

declare(strict_types=1);

namespace App\Http\Controllers\Management\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateManagementNoticeController extends Controller
{
    public function __invoke()
    {
        return redirect('/management/notice');
    }
}