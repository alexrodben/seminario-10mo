<?php

namespace App\Enums;

enum TaxType: int
{
    case EXCLUSIVO = 0;
    case INCLUSIVO = 1;

    public function label(): string
    {
        return match ($this) {
            self::EXCLUSIVO => __('Exclusivo'),
            self::INCLUSIVO => __('Inclusivo'),
        };
    }
}
