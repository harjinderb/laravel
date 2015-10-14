<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
class UI extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cmspages';

	public static function gridData($id){
		$grid= DB::select("select cm.`id`, cm.`title`, cm.`heading`, cm.`category_id`, cm.`short_content`, cm.`featuredImage`, cm.`ext`, cm.`headerimage`, cm.`headerext`,ct.`slug`,ct.`name` as `pagename` from `cmspages` cm, `categories` ct where `ct`.`id`= `cm`.`category_id` and cm.`category_id` in (select `id` from `categories` where `parent_id`=$id) ");
		return $grid;
	}

}
