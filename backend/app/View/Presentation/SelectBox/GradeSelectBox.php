<?php

declare(strict_types=1);

namespace App\View\Presentation\SelectBox;

use App\Enums\Grade;

final class GradeSelectBox
{
    /**
     * Select box で使用するための文字列を返す
     */
    public function __invoke(): array
    {
        $gradeEnum = Grade::cases();
        $grades = array_map(fn (Grade $gradeCode): array => [
            'grade_code' => $gradeCode, //学年 名前がスネークケースなのはDBの都合
            'name' => $gradeCode->label(), //名前
        ], $gradeEnum);

        return [
            'grades' => $grades,
        ];
    }
}