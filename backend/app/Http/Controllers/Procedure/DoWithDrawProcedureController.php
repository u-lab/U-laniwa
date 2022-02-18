<?php

declare(strict_types=1);

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoWithDrawProcedureController extends Controller
{
    public function __invoke()
    {
        return redirect('/procedure');
    }
}