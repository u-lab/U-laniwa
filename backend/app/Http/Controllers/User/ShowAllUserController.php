<?php

declare(strict_types=1);

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowAllUserController extends Controller
{
    /**
     * ユーザー一覧を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        $users = User::where("id", ">", "1")->get();
        $projects = Project::where("id", ">", "1")->get();

        return view('user.index', ["users" => $users, "projects" => $projects,]);
    }
}