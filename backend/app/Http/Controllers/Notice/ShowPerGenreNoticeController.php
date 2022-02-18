<?php

declare(strict_types=1);

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowPerGenreNoticeController extends Controller
{
    public function __invoke()
    {
        return view('notice.genre', []);
    }
}