<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Cart;
use Product;
use Gloudemans\Shoppingcart\CartCollection;
use Gloudemans\Shoppingcart\CartRowCollection;
use Gloudemans\Shoppingcart\CartRowOptionsCollection;

use App\Order;
use App\Order_Item;


class OrderController extends Controller {
    
        const TAXRATE = .13;
        
        public function currencyFormat($amount, $symbol = '$')
        {
            return $symbol . number_format( $amount, 2);
        }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $orders = DB::table('orders')->orderBy('id','asc')->get();
            $cart = Cart::content(); 
            $subtotal = Cart::total();
            $tax = round(($subtotal * self::TAXRATE), 2);
            $total = $subtotal + $tax;
            
            $subtotal = $this->currencyFormat($subtotal);
            $tax = $this->currencyFormat($tax);
            $total = $this->currencyFormat($total);
            //return $cart;
            return view('orders.index', compact('orders','cart', 'subtotal' ,'tax' ,'total'));
	}
        
        /**
         * Get orders by date.
         * 
         */
        public function ordersByDate($orderdate){
            $orders = DB::table('orders')->where('date', '=', $orderdate)->orderBy('id','asc')->get();
            return view('orders.index')->with('orders',$orders);
        }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            $cart = Cart::content(); 
            $subtotal = Cart::total();
            $tax = round(($subtotal * self::TAXRATE), 2);
            $total = $subtotal + $tax;
            
            $subtotal = $this->currencyFormat($subtotal);
            $tax = $this->currencyFormat($tax);
            $total = $this->currencyFormat($total);
            //return $cart;
            return view('orders.checkout', compact('cart', 'subtotal' ,'tax' ,'total'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
