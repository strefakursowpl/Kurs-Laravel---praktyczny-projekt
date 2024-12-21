<?php

namespace App\Enums;

enum ExperienceLevel: string
{
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
