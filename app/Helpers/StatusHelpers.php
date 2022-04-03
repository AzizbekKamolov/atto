<?php
namespace App\Helpers;

class StateHelpers
{
    public static function toMake($state)
    {
        if ($state == 1) return "YAGONA TRANSPORT KARTASI";
        elseif ($state == 2) return "O'QUVCHINING TRANSPORT KARTASI";
        elseif ($state == 3) return "TALABANING TRANSPORT KARTASI";
        elseif ($state == 4) return "IJTIMOIY TRANSPORT KARTASI";
    }
}
