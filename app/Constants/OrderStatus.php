<?php

namespace App\Constants;

final class OrderStatus
{
    const PENDING_CONFIRMATION = 1;
    const PENDING_PACKING = 2;
    const PENDING_SHIPPING = 3;
    const DELIVERED = 4;
    const CANCELLED = 5;


    public static function getList()
    {
        return [
            OrderStatus::PENDING_CONFIRMATION    => trans("pending_confirmation"),
            OrderStatus::PENDING_PACKING => trans("pending_packing"),
            OrderStatus::PENDING_SHIPPING => trans("pending_shipping"),
            OrderStatus::CANCELLED => trans("cancelled"),
            OrderStatus::DELIVERED => trans("delivered"),
        ];
    }

    public static function getValue($key)
    {
        $list = self::getList();

        return isset($list[$key]) ? $list[$key] : '';
    }
}
