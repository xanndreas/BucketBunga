<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => 1,
            'attributes' => array(
                'image' => $request->input('image'),
            )
        ]);

        return back();
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->input('id'));

        return back();
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function cartCheckout(){
        $cart = 'Saya tertarik untuk membeli ';
        $carts = \Cart::getContent();

        foreach ($carts as $it) {
            $cart .= $it->name.',';
        }

        return Redirect::away('http://wa.me/6283832333273?text='.urlencode($cart));
    }
}

