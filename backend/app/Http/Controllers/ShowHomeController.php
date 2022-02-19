<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ShowHomeController extends Controller
{
    public function __invoke()
    {


        return view('home', []);
    }
}