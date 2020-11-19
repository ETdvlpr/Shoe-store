<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$cartItems = \Cart::getContent();
    	return view('checkout')->with(['cartItems' => $cartItems]);
    }
    /**
     * Mock payment
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
    	$total = \Cart::getTotal();
    	\Cart::clear();
    	return view('invoice')->with(['total' => $total, 'billing' => $request]);
    }
}
