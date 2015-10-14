<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*Route::get('/', function()
{
    $data = array();

    if (Auth::check()) {
        $data = Auth::user();
    }
    return View::make('user', array('data'=>$data));
});*/


Route::get('/','UIController@index');

Route::get('dashboard', function(){
if(Auth::check()){
		if(Auth::user()->Role=='SA'){
		return View::make('admin.dashboard');
		}else if(Auth::user()->Role=='AR'){
		return View::make('UI.agentResources');	
		}else{
		return View::make('UI.home');	
		} 
	}
		
});



Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

Route::get('auth/login', function()
{
    $data = array();

    if (Auth::check()) {
        $data = Auth::user();
        return Redirect::to('/');
    }
    return View::make('login', array('data'=>$data));
	
});

Route::get('user/register', 'UsersController@register');
Route::post('users/register', 'UsersController@register');
Route::post('users/login', 'UsersController@login');
Route::post('user/usernameCheck', 'UsersController@usernameCheck');

Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
  
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::to($facebook->getLoginUrl($params));
});


Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
   
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->name = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['username'];
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')->with('message', 'Logged in with Facebook');
});



	/**********Admin*************/

	Route::get('admin', 'AdminController@index');

	////////////////////User Management
	Route::get('admin/users/add-new', 'AdminController@addnew');
	Route::get('admin/users/manage', 'AdminController@manageuser');
	Route::post('changeStatus', 'AdminController@changeStatus');
	Route::post('userDelete', 'AdminController@userDelete');
	Route::get('admin/users/view/{id}', 'AdminController@userView');
	Route::get('admin/users/edit/{id}', 'AdminController@userEdit');
	Route::post('admin/users/edit/{id}', 'AdminController@userEdit');
	Route::get('user-activate/{link}', 'UsersController@userActivate');

	/////////////////Category
	Route::get('admin/category/add-new', 'AdminController@addnewcategory');
	Route::post('admin/category/add-new', 'AdminController@addnewcategory');
	Route::get('admin/category/manage', 'AdminController@managecategory');
	Route::post('category/changeStatus', 'AdminController@categoryChangeStatus');
	Route::post('categoryDelete', 'AdminController@categoryDelete');
	Route::get('admin/category/view/{id}', 'AdminController@categoryView');
	Route::get('admin/category/edit/{id}', 'AdminController@categoryEdit');
	Route::post('admin/category/edit/{id}', 'AdminController@categoryEdit');

	//////////////////CMS

	Route::get('admin/cms-pages/add-new', 'AdminController@addnewpage');
	Route::post('admin/cms-pages/add-new', 'AdminController@addnewpage');
	Route::get('admin/cms-pages/manage', 'AdminController@managepages');
	Route::post('pages/changeStatus', 'AdminController@pageChangeStatus');
	Route::post('pageDelete', 'AdminController@pageDelete');
	Route::get('admin/cms-pages/view/{id}', 'AdminController@pageView');
	Route::get('admin/cms-pages/edit/{id}', 'AdminController@pageEdit');
	Route::post('admin/cms-pages/edit/{id}', 'AdminController@pageEdit');
	
	
	/////////////////////////////BLOG
	Route::get('admin/blog/add-new', 'AdminController@addnewblog');
	Route::post('admin/blog/add-new', 'AdminController@addnewblog');
	Route::get('admin/blogs/manage', 'AdminController@manageblogs');
	Route::post('blogs/changeStatus', 'AdminController@blogChangeStatus');
	Route::post('blogDelete', 'AdminController@blogDelete');
	Route::get('admin/blog/view/{id}', 'AdminController@blogView');
	Route::get('admin/blog/edit/{id}', 'AdminController@blogEdit');
	Route::post('admin/blog/edit/{id}', 'AdminController@blogEdit');

	Route::get('admin/blog/managecat', 'AdminController@manageblogscat');
	Route::get('admin/blogcategories/edit/{id}', 'AdminController@blogEdit');
	Route::post('admin/blog/addblogcat', 'AdminController@addblogcat');
	Route::post('admin/blogcategories/edit/{id}', 'AdminController@blogEdit');
	Route::post('blogscat/changeStatus', 'AdminController@blogcatChangeStatus');
	Route::post('blogcatDelete', 'AdminController@blogcatDelete');
	Route::get('admin/blogcat/view/{id}', 'AdminController@blogcatView');
	Route::get('admin/blogcat/edit/{id}', 'AdminController@blogcatEdit');
	Route::post('admin/blogcat/edit/{id}', 'AdminController@blogcatEdit');

	/////////////////////////////STATEMENT ANALYSIS
	Route::get('admin/statement/manage', 'AdminController@managestatement');
	Route::post('statement/changeStatus', 'AdminController@statementChangeStatus');
	Route::post('statementDelete', 'AdminController@statementDelete');
	Route::get('admin/statement/view/{id}', 'AdminController@statementView');


	/*********End Admin**********/	

	/**********Agent Resources *************/



/////////////////////////////UI

Route::get('blogs', 'UIController@blog');
Route::get('{slug}', 'UIController@viewpage');
Route::post('subscribe', 'UIController@subscribe');
Route::post('statementAnalysis', 'UIController@statementAnalysis');
Route::get('unsubscribe/{slug}','UIController@unsubscribe');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


