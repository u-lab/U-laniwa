<?php

declare(strict_types=1);

namespace App\Enums;

enum Prefecture: int
{
    case HK = 1;
    case AO = 2;
    case IT = 3;
    case MG = 4;
    case AK = 5;
    case YG = 6;
    case FS = 7;
    case IB     = 8;
    case TC = 9;
    case GU = 10;
    case ST = 11;
    case CB = 12;
    case KN = 13;
    case NI = 14;
    case IS = 15;
    /**
     * ここからしたまだ途中
     */
    case ST = 16;
    case ST = 17;
    case ST = 18;
    case ST = 19;
    case GU = 20;
    case ST = 21;
    case ST = 22;
    case ST = 23;
    case ST = 24;
    case ST = 25;
    case ST = 26;
    case ST = 27;
    case ST = 28;
    case ST = 29;
    case GU = 30;
    case ST = 31;
    case ST = 32;
    case ST = 33;
    case ST = 34;
    case ST = 35;
    case ST = 36;
    case ST = 37;
    case ST = 38;
    case ST = 39;
    case GU = 40;
    case ST = 41;
    case ST = 42;
    case ST = 43;
    case ST = 44;
    case ST = 45;
    case ST = 46;
    case ST = 47;




    public function label(): string
    {
        return match ($this) {
            self::ot => "その他",
            self::jp => "日本",
        };
    }
}