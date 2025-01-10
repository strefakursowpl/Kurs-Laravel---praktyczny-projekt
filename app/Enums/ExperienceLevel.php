<?php

namespace App\Enums;

use App\Traits\EnumToSelect;

enum ExperienceLevel: string
{

    use EnumToSelect;

    case JUNIOR = 'junior';
    case MID = 'mid';
    case SENIOR = 'senior';
    case MANAGER = 'manager';

    public function label(): string {
        return match($this) {
            self::JUNIOR => 'Junior',
            self::MID => 'Mid',
            self::SENIOR => 'Senior',
            self::MANAGER => 'Menadżer',
        };
    }
}
