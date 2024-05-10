<?php

namespace App\Constants;

use App\Traits\EnumToArray;

enum UserRoles: string
{

    use EnumToArray;

    case ADMIN = 'admin';
    case USER = 'user';

    public static function getAdmins(): array{
        return [self::ADMIN->value];
    }


}
