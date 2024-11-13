<?php

namespace App\Http\enum ;


enum AccountStatus : string
{
    case Aprroved = 'Approved';
    case Pending = 'Pending';
    case Rejected = 'Rejected';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
   
    }
}