<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class Blogs extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'blogs';

    public static function getblogs(){
	
	$blogs = DB::table('blogs')
	->join('categories', 'categories.id', '=', 'blogs.category_id')
    ->select('blogs.*', 'categories.name as category_name')
	->get();

	return $blogs;
	}
	
	public static function findblogdata($id){
	
	$blogs =  DB::table('blogs')
	->join('categories', 'categories.id', '=', 'blogs.category_id')
    ->select('blogs.*', 'categories.name as category_name')
	->where('blogs.id','=',$id)
	->get();
	return $blogs;
	}
	
	public static function dropdown(){
	    $conditions = ['active' => 1];
		$parentList= DB:: table('categories')
		->whereNotIn('id', function($query){
		$query->select('category_id')
		->from('blogs');	})
		->where($conditions)
		->where('slug','!=','home')
		->get();
		$list['']= 'Select page.';
		foreach($parentList as $lists){
			$list[$lists->id]= $lists->name;
		}
	
	return $list;
	} 


	public static function manageblogscat(){
	
	$blogscat = DB::table('blogcategories')->get();

	return $blogscat;
	}

	public static function findblogcatdata($id){
	
	$blogscat =  DB::table('blogcategories')
	->where('id','=',$id)
	->get();
	return $blogscat;
	}
	
	

}

