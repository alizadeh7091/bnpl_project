<?php

namespace App\Enums;

enum PaymentType : string
{
    case THIRDCASH = '30%_cash';
    case HALFCASH = 'half_cash';
}
