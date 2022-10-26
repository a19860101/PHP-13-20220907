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

        return view('cart.index',compact('carts'));
    }
    public function delete(Cart $cart){
        $cart->delete();
        return redirect()->back();
    }
}
