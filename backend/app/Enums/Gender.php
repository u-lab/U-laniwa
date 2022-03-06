<?php

declare(strict_types=1);

namespace App\Enums;

enum Gender: int
{
    case man = 1;
    case woman = 2;
    case others = 3;

    public function label(): string
    {
        return match ($this) {
            self::man => '男性',
            self::woman => '女性',
            self::others => 'その他',
        };
    }
    public function value(): int
    {
        return match ($this) {
            self::man => 1,
            self::woman => 2,
            self::others => 3,
        };
    }
}