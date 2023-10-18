<?php

namespace App\Enums;


class FuelTypes
{
    const petrol = 'Petrol';
    const diesel = 'Diesel';
    const lpg = 'LPG';
    const eletric = 'Electric';

    const TYPES = [
        self::petrol,
        self::diesel,
        self::lpg,
        self::eletric
    ];

}