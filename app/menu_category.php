<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class menu_category extends Model {

	protected $table = 'menu_category';
        
        protected $fillable = ['name'];
        
        // an author  can have many products
        public function product()
        {
            return $this->hasMany('App\Product');
        }

}
