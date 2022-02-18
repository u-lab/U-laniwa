<?php

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
}