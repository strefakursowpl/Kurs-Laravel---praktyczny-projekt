<?php

namespace App\Traits;

trait EnumToSelect
{
    public static function toSelect($ignore = []): array {

        $arr = [];

        foreach(self::cases() as $enum) {
            if(in_array($enum, $ignore)) {
                continue;
            } else {
                $arr[] = literal(id: $enum->value, name: $enum->label());
            }
        }

        return $arr;
    }
}
