<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class Cmspages extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'cmspages';

    public static function getpages(){
	
	$cmspages = DB::table('cmspages')
	->join('categories', 'categories.id', '=', 'cmspages.category_id')
    ->select('cmspages.*', 'categories.name as category_name')
	->get();

	return $cmspages;
	}
	
	public static function findpagedata($id){
	
	$page =  DB::table('cmspages')
	->join('categories', 'categories.id', '=', 'cmspages.category_id')
    ->select('cmspages.*', 'categories.name as category_name')
	->where('cmspages.id','=',$id)
	->get();
	return $page;
	}
	
	public static function dropdown(){
	    $conditions = ['active' => 1];
		$parentList= DB:: table('categories')
		->whereNotIn('id', function($query){
		$query->select('category_id')
		->from('cmspages');	})
		->where($conditions)
		->where('slug','!=','home')
		->get();
		$list['']= 'Select page.';
		foreach($parentList as $lists){
			$list[$lists->id]= $lists->name;
		}
	
	return $list;
	}
	
	

}
