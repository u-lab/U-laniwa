<?php

declare(strict_types=1);

namespace App\Enums;

enum Grade: int
{
    case b1 = 1;
    case b2 = 2;
    case b3 = 3;
    case b4 = 4;
    case m1 = 5;
    case m2 = 6;
    case d1 = 7;
    case d2 = 8;
    case d3 = 9;
    case memberOfSociety = 10;
    case others = 11;

    public function label(): string
    {
        return match ($this) {
            self::b1 => "学部1年",
            self::b2 => "学部2年",
            self::b3 => "学部3年",
            self::b4 => "学部4年",
            self::m1 => "修士1年",
            self::m2 => "修士2年",
            self::d1 => "博士1年",
            self::d2 => "博士2年",
            self::d3 => "博士3年",
            self::memberOfSociety => "社会人",
            self::others => "その他",
        };
    }
    public function value(): int
    {
        return match ($this) {
            self::b1 => 1,
            self::b2 => 2,
            self::b3 => 3,
            self::b4 => 4,
            self::m1 => 5,
            self::m2 => 6,
            self::d1 => 7,
            self::d2 => 8,
            self::d3 => 9,
            self::memberOfSociety => 10,
            self::others => 11,
        };
    }
}