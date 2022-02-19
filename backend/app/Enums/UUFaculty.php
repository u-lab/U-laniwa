<?php

declare(strict_types=1);

namespace App\Enums;

enum UUFaculty: int
{
    case cooperativeEducation = 1;
    case Engineering = 2;
    case InternationalStudies = 3;
    case regionalDesign = 4;
    case agriculture = 5;

    public function label(): string
    {
        return match ($this) {
            self::cooperativeEducation => "共同教育学部(教育学部)",
            self::Engineering => "工学部",
            self::InternationalStudies => "国際学部",
            self::regionalDesign => "地域デザイン科学部",
            self::agriculture => "農学部",
        };
    }
}