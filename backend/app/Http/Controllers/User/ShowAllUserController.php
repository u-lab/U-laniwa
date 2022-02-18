<?php

declare(strict_types=1);

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ShowAllUserController extends Controller
{
    public function __invoke()
    {
        $users = User::where("id", ">", "1")->get();
        $projects = Project::where("id", ">", "1")->get();

        return view('user.index', compact('users', 'projects'));
    }
}