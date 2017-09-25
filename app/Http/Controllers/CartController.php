<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\CartsItem;
use App\Product;
use App\product_price;
use App\Cart;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function addToCart(Request $request) {

        $customer_id = Auth::id();
        
        $is_cart_exist = Cart::where('customer_id',$customer_id)
        ->count();

        
            echo $is_cart_exist;
            // echo $is_exist;

                    
        if ($is_cart_exist == 0){

            $cart = new Cart;

            $cart->customer_id = $customer_id;
            $cart->save();  


            $cart_id_carts = Cart::where('customer_id',$customer_id)
                ->select('cart_id')
                ->get()
                ->first();  

                $cart_items_id = $cart_id_carts->cart_id; 
                $product_id   = $request -> product_id;
                $barcode  = $request -> barcode;
                $quantity = $request -> quantity;
                $price    = $request -> price;

                $cartItem = new CartsItem;
                
                $cartItem -> cart_id = $cart_items_id;
                $cartItem -> product_id = $product_id;
                $cartItem -> barcode = $barcode;
                $cartItem -> amount = $price;
                $cartItem -> save();
                }

        else{ 

                $cart_id_carts = Cart::where('customer_id',$customer_id)
                ->select('cart_id')
                ->get()
                ->first(); 

                $cart_items_id = $cart_id_carts->cart_id; 
                $product_id   = $request -> product_id;
                $barcode  = $request -> barcode;
                $quantity = $request -> quantity;
                $price    = $request -> price;

            $is_exist = CartsItem::where('product_id', $product_id)
            ->count();

            if($is_exist == 0){

                $cart_id_carts = Cart::where('customer_id',$customer_id)
                ->select('cart_id')
                ->get()
                ->first();  

                $cartItem = new CartsItem;
                $cartItem -> cart_id = $cart_items_id;
                $cartItem -> product_id = $product_id;
                $cartItem -> barcode = $barcode;
                $cartItem -> amount = $price;
                $cartItem -> save();
            }

            if($is_exist != 0) {

                CartsItem::where('product_id', $product_id)->increment('quantity');
                $quantity = CartsItem::where('product_id', $product_id)->value('quantity');
            
                $amount = $quantity*$price;
                CartsItem::where('product_id', $product_id)->update(['amount' => $amount]);

            }
            
        }

        

           
    	\Session::flash('flash_message', 'One Item has been added to cart');

    	 return redirect('/home');
       
    }


    public function showCart(Request $request) {

        $customer_id = Auth::id();

        $carts_id_carts = Cart::where('customer_id',$customer_id)
            ->select('cart_id')
            ->get()
            ->first();

            $cart_items_id = $carts_id_carts->cart_id;
    	
    	
        $carts = CartsItem::
              join('products', 'products.id', '=', 'carts_items.product_id')
            ->join('product_prices', 'product_prices.product_id', '=', 'carts_items.product_id')
            ->where('cart_id','=', $cart_items_id)
            ->get();

        $total = CartsItem::select('amount')
            ->where('cart_id', '=', $cart_items_id)
            ->sum('amount');





    	return view('carts', compact('carts', 'products', 'product_prices', 'total'));
    }


    public function delete_item(Request $request, $product_id) {
        DB::table('carts_items')
        ->where('product_id', $product_id)
    	// $carts = CartsItem::where('id','=',$id)
        // ->where('product_id', $product_id)
    	->delete();

    	\Session::flash('flash_message_delete', 'Item has been remove from your cart!');

    	return redirect('/cart');


    }

    public function show_invoice(Request $request){

        $customer_id = Auth::id();

        $carts_id_carts = Cart::where('customer_id',$customer_id)
            ->select('cart_id')
            ->get()
            ->first();

            $cart_items_id = $carts_id_carts->cart_id;

        $orders = CartsItem:: join('products', 'products.id', '=', 'carts_items.product_id')
            ->join('product_prices', 'product_prices.product_id', '=', 'carts_items.product_id')
            ->where('cart_id','=', $cart_items_id)
            ->get();

        $total = CartsItem::select('amount')
        ->where('cart_id', '=', $cart_items_id)
        ->sum('amount');



        return view('invoice', compact('orders', 'products', 'product_prices', 'total'));

    }
}
