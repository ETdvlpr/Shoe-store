<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a list of shop items
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'];
        $products = Product::where('name','LIKE',"%$search%")->paginate(9);
        return view('shoes', ['products'=>$products]);
    }
}
