<?php

namespace App\Constants;

use App\Traits\EnumToArray;

enum AppointmentState: string
{
    use EnumToArray;

    case DRAFT = "draft";
    case PENDING = "pending";
    case CONFIRMED = "confirmed";
}
