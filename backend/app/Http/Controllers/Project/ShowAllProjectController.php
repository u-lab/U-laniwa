<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Facades\Auth;
use App\Http\Controllers\Controller;
use App\UseCases\Project\GetAllProjectsUseCase;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowAllProjectController extends Controller
{
    public function __construct(
        public GetAllProjectsUseCase $getAllProjectsUseCase
    ) {
    }

    /**
     * 手続きページを表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(): View|Factory
    {
        $user = Auth::user();
        $allProjects = $this->getAllProjectsUseCase->invoke($user->id);

        return view('project.index', [
            'projectsBelonged' => $allProjects['projectsBelonged'],
            'projectsNotBelonged' => $allProjects['projectsNotBelonged'],
        ]);
    }
}
