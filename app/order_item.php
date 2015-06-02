<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order_item
 *
 * @author ILecoche
 */
class order_item {

    protected $table = 'order_item';
    
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    
        
}
