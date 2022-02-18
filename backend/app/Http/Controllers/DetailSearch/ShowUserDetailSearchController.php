<?php

declare(strict_types=1);

namespace App\Http\Controllers\DetailSearch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowUserDetailSearchController extends Controller
{
    public function __invoke()
    {
        return view('detailSearch.user', []);
    }
}