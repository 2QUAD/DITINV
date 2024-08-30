<?php

namespace App\Enums;

enum SupplierType: string
{
    case DISTRIBUTOR = 'Distribuidor';

    case WHOLESALER = 'Atacado';

    case PRODUCER = 'Produtor';

    public function label(): string
    {
        return match ($this) {
            self::DISTRIBUTOR => __('Distribuidor'),
            self::WHOLESALER => __('Atacado'),
            self::PRODUCER => __('Produtor'),
        };
    }
}
