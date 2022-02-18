<?php

declare(strict_types=1);

namespace App\Http\Controllers\System\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateSystemNoticeController extends Controller
{
    public function __invoke()
    {
        return redirect('/system/notice');
    }
}