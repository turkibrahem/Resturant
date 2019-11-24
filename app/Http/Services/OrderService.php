<?php

namespace App\Http\Services;

use App\Constants\OrderStatus;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Repositories\OrderRepository;
use App\Http\Resources\Orders;
use Symfony\Component\HttpFoundation\Request;

class OrderService
{
    protected $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function fillFromRequest(Request $request, $order = null)
    {
        if (!$order) {
            $order = new order();
        }
        $order->fill($request->request->all());
        $order->save();

        return $order;
    }

    public function fillOrderProductsFromRequest(Request $request, $orderProduct = null)
    {

        if (!$orderProduct) {
            $orderProduct = new OrderProduct();
        }

        $orderProduct->fill($request->request->all());
        $orderProduct->price = ($branchProduct->price * $request->request->get('quantity'));
        $orderProduct->category_id = $branchProduct->category_id;

        $orderProduct->save();

        $this->setOrderTotalCost($orderProduct);

        return $orderProduct;
    }

    public function fillApiRequest(Request $request, $order = null)
    {
        if (!$order) {
            $order = new order();
        }

        $order->fill($request->request->all());

        $order->status = OrderStatus::PENDING_CONFIRMATION;

        $order->save();

        $products = $request->request->get('products');
        foreach ($products as $product) {
            $orderProduct = OrderProduct::create(
                [
                'order_id' => $order->id,
                'product_id' =>$product[0],
                'category_id' =>  $product[1],
                'price' =>$product[2],
                'quantity' => $product[3],
                'total' =>(($product[2]) * ($product[3]) )
                ]
            );
            $this->setOrderTotalCost($orderProduct);

        }
        if($request->filled('coupon')) {
            $coupon= Coupon::where('value', $request->get('coupon'))->whereActive(1)->first();
            if($coupon) {
                $order = Order::find($order->id);
                $order->total_price =$order->total_price *($coupon->value/100); 
                $order->save();
            }
        }
    }

    public function setOrderTotalCost($orderProduct)
    {
        $order = Order::find($orderProduct->order_id);
        $order->total_price += $orderProduct->total;
        $order->save();
    }

    // public function orderConfirm($order)
    // {
    //     $order->status = OrderStatus::PENDING_PACKING;

    //     $order->save();

    //     return $order;
    // }

    // public function orderDeliver($order)
    // {
    //     $order->status = OrderStatus::DELIVERED;

    //     $order->save();

    //     return $order;
    // }

   

}
