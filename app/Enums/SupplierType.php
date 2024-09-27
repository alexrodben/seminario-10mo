<?php

namespace App\Enums;

enum SupplierType: string
{
    case DISTRIBUTOR = 'distributor';

    case WHOLESALER = 'wholesaler';

    case PRODUCER = 'producer';

    public function label(): string
    {
        return match ($this) {
            self::DISTRIBUTOR => __('Distribuidor'),
            self::WHOLESALER => __('Mayorista'),
            self::PRODUCER => __('Productor'),
        };
    }
}
