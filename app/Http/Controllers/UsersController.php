<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Session;
use Redirect;
use Auth;
use View;
use Request;
use Hash;
use DB;
use Response;
use OAuth;
use File;
use Validator;
use Image;
use Mail;

class UsersController extends Controller {

	public function __construct(){
	
	}



	 public function index()
	{	
		
		return view('login');
	}
	
	
	 public function register()
	{	
		$query = DB::table('business')->pluck('mobile_client_services');
		
		if (Request::isMethod('post'))
		{
		$data = Input::all();
		$data = Input::except(array('_token','confirmPassword','avtar1','avtar','chkTerms'));

		if(Input::file('avtar')!==null){
			$path_parts = pathinfo(Input::file('avtar')->getClientoriginalName());
			$file = array('file' => Input::file('avtar'),
			'file_name' => Input::file('avtar')->getClientoriginalName(),
			'extension' => Input::file('avtar')->getClientOriginalExtension());	
			
			$rules = array('file' => 'required|max:50000',
			'extension'  => 'required|in:png,jpg,jpeg,gif',
			'file_name' => 'required'
			); 
			
			$validator = Validator::make($file, $rules);
			
			if ($validator->fails()) {
			Session::flash('message', 'Please check the file type and size of the file.');
			Session::flash('alert-class', 'alert-danger'); 
			if (Auth::check()){
			return Redirect::to('admin/users/add-new');
			}else{
			return view('register');
			}

			} else {
			$path_parts = pathinfo(Input::file('avtar')->getClientoriginalName());
	 	
			if (Input::file('avtar')->isValid()) {
			$image = Input::file('avtar');
	
			$extension = $image->getClientOriginalExtension(); // getting image extension
			$fileName = $path_parts['filename'].'-35x35.'.$extension; // renameing image
			$fileName1 = $path_parts['filename'].'-60x60.'.$extension; // renameing image
			$fileName2 = $path_parts['filename'].'-100x100.'.$extension; // renameing image
			
			
			 $filename = $image->getClientOriginalName();
			
			 Image::make($image->getRealPath())->save('dp/'.$filename);
			 Image::make($image->getRealPath())->resize(35, 35)->save('dp/'.$fileName);
			 Image::make($image->getRealPath())->resize(60, 60)->save('dp/'.$fileName1);
			 Image::make($image->getRealPath())->resize(100, 100)->save('dp/'.$fileName2);
		
			$data['image']= $path_parts['filename'];
			$data['ext']= $extension;
											
			}	
				
			}
		}else if(Input::get('avtar1')!==null){
			$path_parts = pathinfo(Input::get('avtar1'));
			$data['image']= $path_parts['filename'];
			$data['ext']= $path_parts['extension'];
		}
		
		$data1 = array('password'=> Hash::make($data['password']),'Mobile'=> $data['CunCode'].'-'.$data['Mobile'],'UserIP' => $_SERVER['REMOTE_ADDR'],'Role'=>'U','Created'=>date('Y-m-d H:i:s'));
		$data2 = array_replace($data, $data1);
		unset($data2['CunCode']);
		
		
		DB::table('users')->insert($data2);
		
		$user= array(
		'to'=>Input::get('email'),
		'from'=>'support@rexwebsolution.com',
		'subject'=>'Welcome to EPS!',
		'name'=>Input::get('FirstName').' '.Input::get('LastName')
		);
		
		if (Auth::guest()){
		$data['emaildata']=array(
		'name'=>Input::get('FirstName').' '.Input::get('LastName'),
		'username'=>Input::get('username'),
		'password'=>Input::get('password'),
		'link'=>Input::get('username').'~'.$data1['password'],
		'query'=>$query
		);
		
		}else{
		$data['emaildata']=array(
		'name'=>Input::get('FirstName').' '.Input::get('LastName'),
		'username'=>Input::get('username'),
		'password'=>Input::get('password'),
		'link'=>'No Link',
		'query'=>$query
		);
					
		}
		
		
		Mail::send('emails.welcome', $data, function($message) use ($user)
		{
		$message->from($user['from'], 'Welcome '.$user['name'].'!');
		$message->to($user['to'] , $user['name'])->subject($user['subject']);
		
		});
	
		if (Auth::check()){
			Session::flash('message', 'User has been add successfully.');
			Session::flash('alert-class', 'alert-success');
			return Redirect::to('admin/users/add-new');
		}else{
			Session::flash('message', 'Successfully registration. Please check your email.');
			Session::flash('alert-class', 'alert-success');
			return view('register');
		}

		}
			
		if (Auth::check()){
			return Redirect::to('admin/users/add-new');
		}else{
			return view('register');
		} 
			
	}
	
	
	public function userActivate($link){
	
		$link= explode('~',$link);
		
		$user= DB::table('users')
		->where('username',$link[0])
		->where('password',$link[1])
		->update(['active' => '1']);
		
		Session::flash('message', 'Successfully Activation.');
		Session::flash('alert-class', 'alert-success');
		
		return Redirect::to('auth/login');
	}
	
	public function login()
	{
		
	$userdata = array(
	'username'     => Input::get('username'),
	'password'     => Input::get('password'),
	'active'	   => 1
	);

	if(Auth::attempt($userdata)){
	
		return Redirect::to('/');	
	
        }else{
        Session::flash('message', 'Please enter correct Username or Password.');
		Session::flash('alert-class', 'alert-error');
        return Redirect::to('auth/login')->withInput(Input::all());
        
		}
		
	}

	public function usernameCheck(){
			
			$username = Input::get('username');
			$result = DB::table('users')->where('username',$username)->pluck('username');
			if(!empty($result)){
				return 'false';
			}else{
				return 'true';
			}
	}
	

}
