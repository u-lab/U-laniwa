<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\UseCases\Project\GetProjectUseCase;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowIndividualProjectController extends Controller
{
    public function __construct(
        public GetProjectUseCase $getProjectUseCase
    ) {
    }

    /**
     * 個別のプロジェクト(プロジェクト詳細ページ)を表示するコントローラー
     *
     * @return View|Factory
     */
    public function __invoke(
        Request $request,
        int $project_id
    ): View|Factory {
        $project = $this->getProjectUseCase->invoke($project_id);

        return view('project.individual', [
            'project' => $project,
        ]);
    }
}
