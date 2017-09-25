<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\CartsItem;

use Illuminate\Http\Request;
use DB; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $customer_id = Auth::id();

        $is_customer_have_cart = Cart::where('customer_id', $customer_id)
        ->count();

        if($is_customer_have_cart == 0){

            $products = DB::table('products')
            ->join('product_prices', 'product_prices.product_id', '=', 'products.id')
            ->get();

            $badge = 0;

             return view('home', compact('products', 'badge'));

        }

        else{
        $cart_id_carts = Cart::where('customer_id',$customer_id)
                ->select('cart_id')
                ->get()
                ->first();  

        $cart_items_id = $cart_id_carts->cart_id;

        $badge = CartsItem::
        select('quantity')
        ->where('cart_id', '=', $cart_items_id)
        ->count();

        $products = DB::table('products')
        ->join('product_prices', 'product_prices.product_id', '=', 'products.id')
        ->get();

        return view('home', compact('products', 'badge'));

        }
       


            


    }
}

