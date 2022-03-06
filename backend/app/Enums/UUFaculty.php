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
    case GraduateSchoolOfRegionalDevelopmentAndCreativity_before = 6;
    case GraduateSchoolOfEducation = 7;
    case GraduateSchoolOfRegionalDevelopmentAndCreativity_after = 8;
    case TheUnitedGraduateSchoolOfAgriculturalScienceTokyoUniversityOfAgricultureAndTechnology = 9;

    public function label(): string
    {
        return match ($this) {
            self::cooperativeEducation => "共同教育学部(教育学部)",
            self::Engineering => "工学部",
            self::InternationalStudies => "国際学部",
            self::regionalDesign => "地域デザイン科学部",
            self::agriculture => "農学部",
            self::GraduateSchoolOfRegionalDevelopmentAndCreativity_before => "地域創生科学研究科(修士)",
            self::GraduateSchoolOfEducation => "教育学研究科(専門職学位)",
            self::GraduateSchoolOfRegionalDevelopmentAndCreativity_after => "地域創生科学研究科(博士)",
            self::TheUnitedGraduateSchoolOfAgriculturalScienceTokyoUniversityOfAgricultureAndTechnology => "東京農工大学大学院連合農学研究科(博士)",
        };
    }
    public function value(): int
    {
        return match ($this) {
            self::cooperativeEducation => 1,
            self::Engineering => 2,
            self::InternationalStudies => 3,
            self::regionalDesign => 4,
            self::agriculture => 5,
            self::GraduateSchoolOfRegionalDevelopmentAndCreativity_before => 6,
            self::GraduateSchoolOfEducation => 7,
            self::GraduateSchoolOfRegionalDevelopmentAndCreativity_after => 8,
            self::TheUnitedGraduateSchoolOfAgriculturalScienceTokyoUniversityOfAgricultureAndTechnology => 9,
        };
    }
}
