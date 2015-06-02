<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order
 *
 * @author ILecoche
 */
class order {
	protected $table = 'orders';
        
        protected $fillable = [
            'customer_name',
            'type',
            'tip'
            ];
        
        // an order can have many order items
        public function order_items()
        {
            return $this->hasMany('App\Order_Item');
        }
}
