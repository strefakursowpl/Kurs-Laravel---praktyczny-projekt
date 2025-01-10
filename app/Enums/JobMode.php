<?php

namespace App\Enums;

use App\Traits\EnumToSelect;

enum JobMode: string
{

    use EnumToSelect;

    case REMOTE = 'remote';
    case ONSITE = 'onsite';
    case HYBRID = 'hybrid';

    public function label(): string {
        return match($this) {
            self::REMOTE => 'Zdalna',
            self::ONSITE => 'Stacjonarna',
            self::HYBRID => 'Hybrydowa',
        };
    }
}
