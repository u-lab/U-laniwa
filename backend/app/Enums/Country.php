<?php

declare(strict_types=1);

namespace App\Enums;

enum Country: int
{
    case ot = 0;
    case jp = 81;


    public function label(): string
    {
        return match ($this) {
            self::ot => "その他",
            self::jp => "日本",
        };
    }
}