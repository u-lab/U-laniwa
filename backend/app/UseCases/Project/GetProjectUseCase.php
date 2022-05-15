<?php

declare(strict_types=1);

namespace App\UseCases\Project;

use App\Models\Project;

final class GetProjectUseCase
{
    public function invoke(
        int $projectId
    ): Project {
        $project = Project::find($projectId);

        return $project;
    }
}
