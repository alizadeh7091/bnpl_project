<?php

namespace App\Enums;

enum OrderStatus : string
{
    case ACTIVE = 'active';
    case CANCELLED = 'cancelled';
}
