<?php namespace App;


use DB;

class Navigation extends Baum\Node { 


	protected $table = 'navigations';

 
		public function parent()
		{
			return $this->belongsTo('category', 'parent_id');
		}

		public function children()
		{
			return $this->hasMany('category', 'parent_id');
		}
		
    public static function tree() {

        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', NULL)->get();

    }
    
    

}
