<?php

declare(strict_types=1);

namespace App\UseCases\Project;

use App\Models\Project;
use App\Models\ProjectBelonged;

final class GetAllProjectsUseCase
{
    /**
     * 全てのプロジェクトを表示する
     *
     * [
     *   '所属しているプロジェクト',
     *   '未所属のプロジェクト',
     * ]
     * @return array
     */
    public function invoke(
        int $userId,
    ): array {
        // 全てのプロジェクト
        $projects = Project::all();
        // 全てのプロジェクト の ID
        $projectIds = $projects->pluck('id')->toArray();

        // ユーザーが所属しているプロジェクト
        $projectsBelongedRelation = ProjectBelonged::whereUserId($userId)
            ->get()
            ->sortByDesc('updated_at');
        // ユーザーが所属しているプロジェクト の ID
        $projectsBelongedIds = $projectsBelongedRelation->pluck('project_id')->toArray();
        // ユーザーが未所属のプロジェクト
        $projectsBelonged = $projects->whereIn('id', $projectsBelongedIds)
            ->sortByDesc('updated_at');

        // ユーザーが未所属のプロジェクト の ID
        $projectsNotBelongedIds = array_diff($projectIds, $projectsBelongedIds);
        // ユーザーが未所属のプロジェクト
        $projectsNotBelonged = $projects->whereIn('id', $projectsNotBelongedIds)
            ->sortByDesc('updated_at');

        return [
            'projectsBelonged' => $projectsBelonged,
            'projectsNotBelonged' => $projectsNotBelonged,
        ];
    }
}
