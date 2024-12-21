<?php

namespace App\Enums;

enum InquiryStatus: string
{
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
