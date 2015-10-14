<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';


	protected $fillable = ['name', 'email', 'password'];

	
	protected $hidden = ['password', 'remember_token'];
	
	public function profiles()
    {
        return $this->hasMany('Profile');
    }
	
	
	public static function getusers(){
	
	$user = DB::table('users')->where('Role','!=','SA' )->get();
	return $user;
	}
	
	public static function finduser($id){
	
	$user = DB::table('users')->where('id','=',$id, 'and', 'Role','=','U')->get();
	return $user;
	}

	
	

}
