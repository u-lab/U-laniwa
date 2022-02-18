<?php

namespace App\Enums;

enum NoticeGenre: int
{
    case committee = 1;
    case systemAdmin = 2;

    public function label(): string
    {
        return match ($this) {
            self::committee => '運営からのお知らせ',
            self::systemAdmin => 'システム管理者からのお知らせ',
        };
    }
}