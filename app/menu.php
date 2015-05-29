<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class menu extends Model{

	protected $table = "order_item";
	public $timestamps = false;
	protected $fillable = ['order_id', 'menu_item_id', 'qty'];

}