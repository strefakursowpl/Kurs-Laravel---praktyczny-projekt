<?php

namespace App\Enums;

enum JobType: string
{
    case MANDATE_CONTRACT = 'mandate_contract';
    case EMPLOYMENT_CONTRACT  = 'employment_contract';
    case WORK_CONTRACT  = 'work_contract';
    case B2B  = 'b2b';

    public function label(): string {
        return match($this) {
            self::MANDATE_CONTRACT => 'Umowa zlecenie',
            self::EMPLOYMENT_CONTRACT => 'Umowa o pracę',
            self::WORK_CONTRACT => 'Umowa o dzieło',
            self::B2B => 'B2B',
        };
    }
}
