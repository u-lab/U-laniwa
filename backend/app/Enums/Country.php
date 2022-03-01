<?php

declare(strict_types=1);

namespace App\Enums;

enum Country: int
{
    case ot = 0;
    case jp = 81;
    /**
     * 国名コードは3桁がマックスのはず
     */


    public function label(): string
    {
        return match ($this) {
            self::ot => "外国",
            self::jp => "日本",
        };
    }
}