<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ShowHomeController extends Controller
{
    public function __invoke()
    {
        $user = User::where("id", ">", "1")->get();
        $project = Project::where("id", ">", "1")->get();

        return view('home', compact('user', 'project'));
    }
}