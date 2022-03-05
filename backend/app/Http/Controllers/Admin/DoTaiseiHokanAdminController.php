<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class DoTaiseiHokanAdminController extends Controller
{
    /**
     * Undocumented function
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector|RedirectResponse
    {
        return redirect('/admin');
    }
}