<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    //
    public function addToCart(Request $request){
        Cart::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id()
        ]);
        return redirect()->back();
    }
    public function cartIndex(){
        $carts = Cart::where('user_id',Auth::id())->get();

        $price = [];

        foreach($carts as $cart){
            // if($cart->product->special_price){
            //     $price[] = $cart->product->special_price;
            // }else{
            //     $price[] = $cart->product->price;
            // }

            $price[] = $cart->product->special_price ?? $cart->product->price ;
        }
        $total = collect($price)->sum();
        return view('cart.index',compact('carts','total'));
    }
    public function delete(Cart $cart){
        $cart->delete();
        return redirect()->back();
    }
    public function empty(){
        $carts = Cart::where('user_id',Auth::id())->get();
        foreach($carts as $cart){
            $cart->delete();
        }
        return redirect()->back();
    }
}
