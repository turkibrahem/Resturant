<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Coupon;
use Illuminate\Routing\Controller;
use App\Http\Services\OrderService;
use App\Http\Requests\Api\OrderRequest;
use Symfony\Component\HttpFoundation\Request;
use App\Constants\OrderStatus ;
class OrdersController extends Controller
{
  

    public function index()
    {
        $orders = Order::with('products')
            ->orderBy("created_at", "DESC")
            ->get();

        return response()->json($orders);
    } 

    public function show(Order $order)
    {
        $order = $order->with('orderProducts')
                ->where('id', $order->id)
                ->get();
                
        return response()->json($order);
    }

    public function store(OrderRequest $request, OrderService $orderService)
    {
        if($request->filled('coupon')) {
            $coupon= Coupon::where('value', $request->get('coupon'))->whereActive(1)->first();
            if(!$coupon) {
                return response()->json("coupon code is despired or doesnot exist");
            }
            
        }
        $order = $orderService->fillApiRequest($request);
        return response()->json("added");
    }
    public function orderCancel(Order $order)
    {
        $order->status = OrderStatus::CANCELLED ;
        $order->save();
        return response()->json("cancelled");
    }
    
    
    public function phoneOrders(Request $request)
    {
        $orders = Order::with('orderProducts')
            ->where('phone', $request->phone)
            ->orderBy("created_at", "DESC")
            ->get();

        return response()->json($orders);
    }

}
