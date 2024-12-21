<?php

namespace App\Enums;

enum Role: string
{
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
