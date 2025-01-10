<?php

namespace App\Enums;

use App\Traits\EnumToSelect;

enum Role: string
{
    use EnumToSelect;

    case USER = 'user';
    case EMPLOYER = 'employer';
    case ADMIN = 'admin';

    public function label(): string {
        return match($this) {
            self::USER => 'Użytkownik',
            self::EMPLOYER => 'Pracodawca',
            self::ADMIN => 'Administrator',
        };
    }
}
