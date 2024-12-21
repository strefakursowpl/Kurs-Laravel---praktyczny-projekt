<?php

namespace App\Enums;

enum JobMode: string
{
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
