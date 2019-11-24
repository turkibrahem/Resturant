<?php

namespace App\Http\Services;

use App\Models\Coupon;
use Symfony\Component\HttpFoundation\Request;

class CouponService
{
    public function __construct()
    {
    }

    public function fillFromRequest(Request $request, $coupon = null)
    {
        if (!$coupon) {
            $coupon = new Coupon();
        }

        $coupon->fill($request->request->all()) ;
        $coupon->active = $request->request->get('active', 1) ;
        $coupon->save();

        return $coupon;
    }

}
