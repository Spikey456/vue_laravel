<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function storeItem(Request $request) {
        $cart = new Cart();
        $cart->prod_name = $request->prod_name;
        $cart->price = $request->price;
        $cart->qty = $request->qty;
        $cart->total_price = $request->total_price;
        $cart->save();

        return $cart;
    }

    public function getItems(Request $request) {
        $cart = Cart::all();

        return $cart;
    }
    
    public function deleteItem(Request $request){
        $cart = Cart::find($request->id)->delete();
    }

    public  function editItem(Request $request, $id){
        $cart = Cart::where('id',$id)->first();

        $cart->prod_name = $request->get('val_1');
        $cart->price = $request->get('val_2');
        $cart->qty = $request->get('val_3');
        $cart->total_price = $request->get('val_4');
        $cart->save();

        return $cart;
    }
}
