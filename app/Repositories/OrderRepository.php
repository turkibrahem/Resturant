<?php

namespace App\Repositories;

use App\Models\Order;
use Symfony\Component\HttpFoundation\Request;

class OrderRepository
{
    public function search(Request $request)
    {
        $orders = Order::query()->orderByDesc("id");

        if (($request->get('filter_by') == "branch_id" || $request->get('filter_by') == "address_id") && !empty($request->get('q'))) {
            $orders->where($request->get('filter_by'), $request->get('q'));
        }
        if ($request->get('filter_by') == "vendor_id" && !empty($request->get('q'))) {
            $orders->whereHas('branch.vendor', function ($query) use ($request) {
                $query->where('id', $request->query->get('q'));
            });
        }
        if ($request->get('status') && !empty($request->get('status'))) {
            $orders->where('status', $request->query->get('status'));
        }
        if ($request->get('payment_type') && !empty($request->get('payment_type'))) {
            $orders->where('payment_type', $request->query->get('payment_type'));
        }
        if ($request->get('type') && !empty($request->get('type'))) {
            $orders->whereHas('branch.vendor', function ($query) use ($request) {
                $query->where('type', $request->query->get('type'));
            });
        }

        if ($request->has('from_date') && !empty($request->get('from_date'))) {
            $orders->where('created_at', '>=', $request->get('from_date'));
        }
        if ($request->has('to_date') && !empty($request->get('to_date'))) {
            $orders->where('created_at', '<=', $request->get('to_date'));
        }

        return $orders;
    }
}
