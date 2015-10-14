<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class Categories extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'categories';

 
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
    
    public static function getcategories(){
		
	$parentList= DB:: table('categories')->where('parent_id',0)->get();
		foreach($parentList as $lists){
			$list[]= $lists;
				$childList= DB:: table('categories')->where('parent_id',$lists->id)->get();
				foreach($childList as $clists){
				$list[]= $clists;
					$childList1= DB:: table('categories')->where('parent_id',$clists->id)->get();
					foreach($childList1 as $clists1){
					$list[]= $clists1;
						$childList2= DB:: table('categories')->where('parent_id',$clists1->id)->get();
						foreach($childList2 as $clists2){
						$list[]= $clists2;
						}
					}
				}
		}
	
	return $list;
	}
	
	public static function dropdown(){
	
		$parentList= DB:: table('categories')
		->where('parent_id',0)
		->where('active',1)
		->get();
		$list['']= 'Self';
		foreach($parentList as $lists){
			$list[$lists->id]= $lists->name;
				$childList= DB:: table('categories')
				->where('parent_id',$lists->id)
				->where('active',1)
				->get();
				foreach($childList as $clists){
				$list[$clists->id]= '- '.$clists->name;
					$childList1= DB:: table('categories')
					->where('parent_id',$clists->id)
					->where('active',1)
					->get();
					foreach($childList1 as $clists1){
					$list[$clists1->id]= '-- '.$clists1->name;
					}
				}
		}
	
	return $list;
	}
	
	public static function parentnavigation(){
		
	$parent= DB:: table('categories')
		->where('parent_id',0)
		->where(array('active'=>1,'navigation'=>1))
		->get();
	
		foreach($parent as $parent){
			
			$root[]= array('slug'=>$parent->slug,'name'=>$parent->name,'id'=>$parent->id);
		}
	
		return $root;
	}
	
	public static function childnavigation($id){
		
	$child= DB:: table('categories')
		->where('parent_id',$id)
		->where(array('active'=>1,'navigation'=>1))
		->get();
		if(count($child)>0){
		foreach($child as $child){
			
			$root[]= array('slug'=>$child->slug,'name'=>$child->name,'id'=>$child->id);
		}
		}else{
		$root= 'No child';	
		}
		return $root;
		
	}
	
	
	public static function findcategory($id){ 
	
	$category =  DB::table('categories')
	->where('id','=',$id)
	->get();
	
	return $category;
	}

}
