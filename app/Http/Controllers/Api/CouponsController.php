<?php

namespace App\Http\Controllers\Api ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Constants\PromotionTypes;
use App\Http\Services\CouponService;
use App\Http\Requests\Api\CouponRequest;

class CouponsController extends Controller
{
    protected $couponService;
 
    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }


    public function index()
    {
        $coupons = coupon::where('active', 1)->get() ;
        return response()->json($coupons);
    }

    public function store(CouponRequest $request)
    {
        $this->couponService->fillFromRequest($request);
        return response()->json("saved");
     }

    public function update(CouponRequest $request, Coupon $coupon)
    {
        $this->couponService->fillFromRequest($request, $coupon);
        return response()->json("updated");
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return response()->json("deleted");
    }
}
