<?php

declare(strict_types=1);

namespace App\Enums;

enum Prefecture: int
{
    case other = 0;
    case hokkaido = 1;
    case aomori = 2;
    case iwate = 3;
    case miyagi = 4;
    case akita = 5;
    case yamagata = 6;
    case fukusima = 7;
    case ibaraki = 8;
    case tochigi = 9;
    case gunma = 10;
    case saitama = 11;
    case chiba = 12;
    case tokyo = 13;
    case kanagawa = 14;
    case niigata = 15;
    case toyama = 16;
    case ishikawa = 17;
    case fukui = 18;
    case yamanashi = 19;
    case nagano = 20;
    case gifu = 21;
    case shizuoka = 22;
    case aichi = 23;
    case mie = 24;
    case shiga     = 25;
    case kyoto = 26;
    case osaka = 27;
    case hyogo = 28;
    case nara = 29;
    case wakayama = 30;
    case tottori = 31;
    case shimane = 32;
    case okayama = 33;
    case hiroshima = 34;
    case yamaguchi = 35;
    case tokushima = 36;
    case kagawa = 37;
    case ehime = 38;
    case kochi = 39;
    case fukuoka = 40;
    case saga = 41;
    case nagasaki = 42;
    case kumamoto = 43;
    case oita = 44;
    case miyazaki = 45;
    case kagoshima = 46;
    case okinawa = 47;




    public function label(): string
    {
        return match ($this) {

            self::other => "その他",
            self::hokkaido => "北海道",
            self::aomori => "青森県",
            self::iwate => "岩手県",
            self::miyagi => "宮城県",
            self::akita => "秋田県",
            self::yamagata => "山形県",
            self::fukusima => "福島県",
            self::ibaraki => "茨城県",
            self::tochigi => "栃木県",
            self::gunma => "群馬県",
            self::saitama => "埼玉県",
            self::chiba => "千葉県",
            self::tokyo => "東京都",
            self::kanagawa => "神奈川県",
            self::niigata => "新潟県",
            self::toyama => "富山県",
            self::ishikawa => "石川県",
            self::fukui => "福井県",
            self::yamanashi => "山梨県",
            self::nagano => "長野県",
            self::gifu => "岐阜県",
            self::shizuoka => "静岡県",
            self::aichi => "愛知県",
            self::mie => "三重県",
            self::shiga     => "滋賀県",
            self::kyoto => "京都府",
            self::osaka => "大坂府",
            self::hyogo => "兵庫県",
            self::nara => "奈良県",
            self::wakayama => "和歌山県",
            self::tottori => "鳥取県",
            self::shimane => "島根県",
            self::okayama => "岡山県",
            self::hiroshima => "広島県",
            self::yamaguchi => "山口県",
            self::tokushima => "徳島県",
            self::kagawa => "香川県",
            self::ehime => "愛媛県",
            self::kochi => "高知県",
            self::fukuoka => "福岡県",
            self::saga => "佐賀県",
            self::nagasaki => "長崎県",
            self::kumamoto => "熊本県",
            self::oita => "大分県",
            self::miyazaki => "宮崎県",
            self::kagoshima => "鹿児島県",
            self::okinawa => "沖縄県",
        };
    }
    public function value(): int
    {
        return match ($this) {
            self::other => 0,
            self::hokkaido => 1,
            self::aomori => 2,
            self::iwate => 3,
            self::miyagi => 4,
            self::akita => 5,
            self::yamagata => 6,
            self::fukusima => 7,
            self::ibaraki => 8,
            self::tochigi => 9,
            self::gunma => 10,
            self::saitama => 11,
            self::chiba => 12,
            self::tokyo => 13,
            self::kanagawa => 14,
            self::niigata => 15,
            self::toyama => 16,
            self::ishikawa => 17,
            self::fukui => 18,
            self::yamanashi => 19,
            self::nagano => 20,
            self::gifu => 21,
            self::shizuoka => 22,
            self::aichi => 23,
            self::mie => 24,
            self::shiga     => 25,
            self::kyoto => 26,
            self::osaka => 27,
            self::hyogo => 28,
            self::nara => 29,
            self::wakayama => 30,
            self::tottori => 31,
            self::shimane => 32,
            self::okayama => 33,
            self::hiroshima => 34,
            self::yamaguchi => 35,
            self::tokushima => 36,
            self::kagawa => 37,
            self::ehime => 38,
            self::kochi => 39,
            self::fukuoka => 40,
            self::saga => 41,
            self::nagasaki => 42,
            self::kumamoto => 43,
            self::oita => 44,
            self::miyazaki => 45,
            self::kagoshima => 46,
            self::okinawa => 47,
        };
    }
}
