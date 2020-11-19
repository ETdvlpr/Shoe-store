<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    /**
     * Add product to cart.
     *
     * @param  int  $request with parameters of shoe
     * @return \Illuminate\Http\Response
     */
    public function add(Request$request){
    	\Cart::add([
    		'id' => $request->id,
    		'name' => $request->name,
    		'price' => $request->price,
    		'quantity' => $request->quantity,
    		'attributes' => [
    			'image' => $request->image,
    			'currency' => $request->currency
    		]
    	]);
    	return redirect()->back()->with('success', 'Shoe Added to Cart');
    }


    /**
     * Show product list in cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()  {
    	$cartCollection = \Cart::getContent();
    	return view('cart')->with(['cartCollection' => $cartCollection]);
    }

    /**
     * Remove product from cart.
     *
     * @param  int  $request with id of shoe
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request){
    	\Cart::remove($request->id);
    	return redirect()->route('cart.index')->with('success', 'Shoe removed from cart');
    }

    /**
     * Update quantity of product in cart.
     *
     * @param  int  $request with id of product and new quantity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
    	\Cart::update($request->id,
    		[
    			'quantity' => [
    				'relative' => false,
    				'value' => $request->quantity
    			],
    		]);
    	return redirect()->route('cart.index')->with('success', 'Quantity of shoes updated');
    }

    /**
     * Remove all items in cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success', 'Cart is cleared');
    }
}
