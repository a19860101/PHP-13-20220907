<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use Auth;
use DB;
class OrderController extends Controller
{
    //
    public function checkout(){
        $orderNo = time();
        $order = Order::create([
            'orderNo' => $orderNo,
            'user_id' => Auth::id()
        ]);

        $carts = Cart::where('user_id',Auth::id())->get();
        foreach($carts as $cart){
            DB::table('order_details')->insert([
                'product_id'    => $cart->product->id,
                'order_id'      => $order->id
            ]);
        }

        return redirect('result');
    }
    public function orderList(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('order.list',compact('orders'));
    }
    public function detail(Order $order){
        $orderDetails = OrderDetail::where('order_id',$order->id)->get();
        return $orderDetails;
    }
}
