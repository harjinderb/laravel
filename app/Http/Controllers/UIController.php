<?php namespace App\Http\Controllers;
use UI;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Redirect;
use View;
use Response;
use DB;
use Mail;
use Str;



class UIController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	*/

		public function __construct()
		{
	
		}
		
		protected $layout = 'layouts.UI';

		public function index()
		{		
		$data['page_title'] = 'Home Page';
				
		return View::make('UI.home', $data);
		}  
		    
		////////////////////////////////// Front-end
		 
		public function viewpage($slug)
		{	
			$catdata= DB::table('categories')->where('slug',$slug)->get();
			if(count($catdata)>0){
			$pagedata= DB::table('cmspages')->where('category_id',$catdata[0]->id)->get();
			
			foreach($pagedata as $pdata){
			$pagedata = $pdata;
			}
			
				if($slug=='contact-eps'){
					return View::make('UI.contact')->with('page',$pagedata);
				}else{
					return View::make('UI.innerpage')->with('page',$pagedata);
				}
			}else{
		
				return View::make('errors.404');
			}
			
		} 
		
		public function subscribe(){
			$data = Input::only('email');
			$email = Input::get('email');
			$result = DB::table('subscribedUsers')->where('email',$data)->pluck('email');
			if(empty($result)){
				$data['created']= date('Y-m-d H:i:s');
				

			//$query = DB::table()
			DB :: table('subscribedUsers')->insert($data); 

					/*
			E-mail send code start
			*/
			
			$emaildata['emaildata'] = array(
			'name'=>'User',
			'email'=>$email,
			'unsubscribe'=>'http://bobby.rexwebsolution.com/unsubscribe/'.base64_encode($email),
			'query'=>'(888) 859-9219'
			);
			$user = array(
			'user'=>'Dear User,'
			);

			// the data that will be passed into the mail view blade template
			


			Mail::send('emails.usermail', $emaildata, function($message) use ($user)
			{
			$message->from('support@rexwebsolution.com', 'EPS');
			$message->to('devender.rexweb@gmail.com' ,$user['user'])->subject('Subscribed Successfully.');

			});


					/*
			E-mail send code end
			*/
				return 'true';			
			}else{

				return 'false';
			}
			die(); 

		}
		
		public function statementAnalysis(){
			
		$data = Input::all();
		$data = Input::except(array('_token','confirmcapcha','capcha'));
		$data['created']= date('Y-m-d H:i:s');

		$response = DB :: table('statementAnalysis')->insertGetId($data);
		$query = DB :: table('business')->get();
		$query = $query[0]->query;


		if(!empty($response)){

			$result = DB::table('statementAnalysis')->where('id',$response)->get();
			foreach ($result as $value) {
				$result = $value;
				# code...
			}
						// Email send to Admin start.
			$emaildata['emaildata'] = array(
			'name'=>'Administrator',
			'uname'=>$result->name,
			'business'=>$result->business,
			'email'=>$result->email,
			'phone'=>$result->phone,
			'current_rate'=>$result->current_rate,
			'state'=>$result->state,
			'city'=>$result->city,
			'hear_about'=>$result->hear_about,
			'hear_about_other'=>$result->hear_about_other
			
			);
			$user = array(
			'user'=>'Dear Administrator,'
			);

			// the data that will be passed into the mail view blade template
			


			Mail::send('emails.adminmail', $emaildata, function($message) use ($user)
			{
			$message->from('support@rexwebsolution.com', 'EPS');
			$message->to($query ,$user['user'])->subject('New User Registration .');

			});

			// Email send to Admin ends.

		}else{
			return Redirect::to('/');
		}
		die('sent');
		
		return Redirect::to('/');
		}

		public function unsubscribe($data){
		$data = base64_decode($data);
		$result = DB::table('subscribedUsers')->where('email',$data)->delete();
		if($result ==1)
		{
			Session::false('success','You have successfully unsubscribed from our newsletter');
			return Redirect::to('/');
		

		}else{
			Session::false('success','You are not registered to our Newsletter anymore.');
			return Redirect::to('/');
				}
		 
		}
		
		
		////////////////////////////////// Agent Resources
		
		public function agentResources(){
			echo 'Agent Resources'; die;
		}
		
		
		////////////////////////////////// Agent Resources
		
		public function blog(){
			$catdata= DB::table('categories')->where('slug','blogs')->get();
		
			$data['page_title'] = $catdata[0]->name;
			$pagedata= DB::table('cmspages')->where('category_id',$catdata[0]->id)->get();
			if(count($pagedata)>0){
			foreach($pagedata as $pdata){
			$pagedata = $pdata;
			}
			return View::make('UI.blog',$data)->with('page',$pagedata);
			}else{
		
				return View::make('errors.404');
			}
			
		}
		       
 }
 
?>
