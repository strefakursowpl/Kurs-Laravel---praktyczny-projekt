<?php

namespace App\Enums;

enum JobSchedule: string
{
    case FULL_TIME = 'full_time';
    case PART_TIME = 'part_time';
    case SIDE_JOB = 'side_job';

    public function label(): string {
        return match($this) {
            self::FULL_TIME => 'Pełny etat',
            self::PART_TIME => 'Część etatu',
            self::SIDE_JOB => 'Dodatkowa / tymczasowa',
        };
    }
}
