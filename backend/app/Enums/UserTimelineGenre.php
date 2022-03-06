<?php

declare(strict_types=1);

namespace App\Enums;

enum UserTimelineGenre: int
{
    case schoolwork = 1;
    case work = 2;
    case qualification = 3;
    case group_affiliation = 4;
    case contest = 5;

    public function label(): string
    {
        return match ($this) {
            self::schoolwork => '学業',
            self::work => 'お仕事',
            self::qualification => '資格',
            self::group_affiliation => '団体所属',
            self::contest => '大会',
        };
    }
    public function value(): int
    {
        return match ($this) {
            self::schoolwork => 1,
            self::work => 2,
            self::qualification => 3,
            self::group_affiliation => 4,
            self::contest => 5,
        };
    }
}