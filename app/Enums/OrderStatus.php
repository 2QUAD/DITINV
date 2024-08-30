<?php

namespace App\Enums;

enum OrderStatus: int
{
    case PENDING = 0;
    case COMPLETE = 1;
    case CANCEL = 2;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => __('Pendente'),
            self::COMPLETE => __('Finalizado'),
            self::CANCEL => __('Cancelada'),
        };
    }
}
