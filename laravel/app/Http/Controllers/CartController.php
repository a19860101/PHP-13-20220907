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
}
