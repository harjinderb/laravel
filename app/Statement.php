<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class Statement extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'statementAnalysis';

    public static function getblogs(){
	
	$statement = DB::table('statementAnalysis')
	->get();

	return $statement;
	}
	
	public static function findstatement($id){
	
	$statement =  DB::table('statementAnalysis')
	->where('id','=',$id)
	->get();
	return $statement;
	}

	public static function managestatement(){
	
	$statement = DB::table('statementAnalysis')->get();

	return $statement;
	}

	public static function findstatementdata($id){
	
	$statement =  DB::table('statementAnalysis')
	->where('id','=',$id)
	->get();
	return $statement;
	}
	
	

}

