<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Cart;
use Product;
use Gloudemans\Shoppingcart\CartCollection;
use Gloudemans\Shoppingcart\CartRowCollection;
use Gloudemans\Shoppingcart\CartRowOptionsCollection;

class CartController extends Controller {
    
        const TAXRATE = .13;
        
        public function currencyFormat($amount, $symbol = '$')
        {
            return $symbol . number_format( $amount, 2);
        }

	/**
        * Add a row to the cart
        *
        * @param string|Array $id      Unique ID of the item|Item formated as array|Array of items
        * @param string       $name    Name of the item
        * @param int          $qty     Item qty to add to the cart
        * @param float        $price   Price of one item
        * @param Array        $options Array of additional options, such as 'dressing' or 'topping'
         */
	public function add(Request $request)
	{
		

            // Basic form
            //Cart::add('293ad', 'Product 1', 1, 9.99, array('size' => 'large'));
              $input = $request->all();
              //Cart::associate('product')->add($input['id'], $input['name'], $input['qty'], $input['price']);
    
            // Array form
            Cart::add(array('id' => $input['id'], 'name' => $input['name'], 'qty' => $input['qty'], 'price' => $input['price']));

            // Batch method
            //Cart::add(array(
            //  array('id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00),
            //  array('id' => '4832k', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => array('size' => 'large'))
            //));
            
            return redirect('cart');
	}

	/**
        * Update the quantity of one row of the cart
        *
        * @param  string        $rowId       The rowid of the item you want to update
        * @param  integer|Array $attribute   New quantity of the item|Array of attributes to update
        * @return boolean
        */
	public function update($id, $qty)
	{
            Cart::update($id, $qty);
//            return Response::json( array(
//                'qty' => $qty
//            ) );
            return redirect('cart');
	}

	/**
        * Remove a row from the cart
        *
        * @param  string  $rowId The rowid of the item
        * @return boolean
        */
	public function remove($id)
	{
            Cart::remove($id);
            return redirect('cart');
	}

	/**
        * Get a row of the cart by its ID
        *
        * @param  string $rowId The ID of the row to fetch
        * @return CartRowCollection
        */
	public function show($id)
	{
		//
	}

	/**
        * Get the cart content
        *
        * @return CartCollection
        */
	public function all()
	{
            $cart = Cart::content(); 
            $subtotal = Cart::total();
            $tax = round(($subtotal * self::TAXRATE), 2);
            $total = $subtotal + $tax;
            
            $subtotal = $this->currencyFormat($subtotal);
            $tax = $this->currencyFormat($tax);
            $total = $this->currencyFormat($total);
            //return $cart;
            return view('cart.index', compact('cart', 'subtotal' ,'tax' ,'total'));
	}

	/**
        * Empty the cart
        *
        * @return boolean
        */
	public function destroy()
	{
		Cart::destroy();
                return redirect('/');

	}

	/**
        * Get the price total
        *
        * @return float
        */
	public function total()
	{
		//
	}
        
        /**
        * Get the number of items in the cart
        *
        * @param  boolean $totalItems Get all the items (when false, will return the number of rows)
        * @return int
        */
	public function count()
	{
		//
	}
        
        /**
        * Search if the cart has a item
        *
        * @param  Array  $search An array with the item ID and optional options
        * @return Array|boolean
        */
	public function search()
	{
		//
	}

}
