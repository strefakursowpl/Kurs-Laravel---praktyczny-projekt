<?php

namespace App\Enums;

use App\Traits\EnumToSelect;

enum InquiryStatus: string
{
    use EnumToSelect;

    case SENT = 'sent';
    case READ = 'read';
    case REJECTED = 'rejected';
    
    public function label(): string {
        return match($this) {
            self::SENT => 'Wysłano',
            self::READ => 'Wyświetlono',
            self::REJECTED => 'Odrzucono',
        };
    }
}
