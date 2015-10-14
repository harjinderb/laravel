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
use File;
use Validator;
use Image;
use Mail;


use App\User;
use App\Categories;
use App\Cmspages;
use App\Blogs;
use App\Statement;


class AdminController extends Controller {

	public function __construct(){
	$this->middleware('auth');
	

	}


	 public function index()
	{	
				
		return view('admin.dashboard');
	}
	
	 public function addnew()
	{		
		
		return view('admin.adduser');
	}
	
	 public function manageuser()
	{			
		
		$users = User::getusers();
		
		$data['allUsers']= $users;
		return View::make('admin.manageuser', $data);
		
	}
	
	public function changeStatus()
	{			
		$input = Input::only('id', 'status');
		$userstatus= DB::table('users')
            ->where('id', $input['id'])
            ->update(['active' => $input['status']]);
          		
	}
	public function userDelete()
	{			
		$input = Input::only('id');
		
		$userstatus= DB::table('users')
            ->where('id', $input['id'])
            ->delete();
          		
	}
	public function userView($id)
	{		
		$data['userId']= $id;	
		$data['userData']= DB:: table('users')->where('id',$id)->get();
		
		return View::make('admin.userView', $data);
          		
	}
	
	public function userEdit($id)
	{	
				
		if (Request::isMethod('post'))
		{
			
		$data = Input::all();
		$data = Input::except(array('_token','confirmPassword','avtar1','avtar'));

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
		
			return View::make('admin.userEdit'.$id);

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
		}else{
			$path_parts = pathinfo(Input::get('image'));
			$data['image']= $path_parts['filename'];
			$data['ext']= $path_parts['extension'];
		}
		
		
		if(Input::get('password')!=''){
		$data['password']= 	Hash::make(Input::get('password'));
		}else{
		unset($data['password']);
		}
		$data['mobile']= $data['CunCode'].'-'.$data['Mobile'];
		
		unset($data['CunCode']);
		
		DB::table('users')->where('id',$data['id'])->update($data);
		Session::flash('message', 'User data has successfully been updated.');
		Session::flash('alert-class', 'alert-success');
		return Redirect::to('admin/users/edit/'.$id);
		
		}
		
		$userData = User::finduser($id);
		
		foreach($userData as $udata){
			$User= $udata;
		}
		return View::make('admin.userEdit')->with('User', $User);
		
          		
	}
	////////////////////////////// Category Management 
	
	public function addnewcategory(){
		
		if (Request::isMethod('post'))
		{
			
		$data = Input::all();
		$data = Input::except(array('_token'));
		$data['created']= date('Y-m-d H:i:s');
		
		$slug= DB::table('categories')
		->select(DB::raw('COUNT(slug) as slugnum') )
		->where('slug',Input::get('slug'))
		->get();
		if($slug[0]->slugnum >0){
		$data['slug'] = $slug[0]->slugnum;
		}
		
		DB :: table('categories')->insert($data); 
		
		return Redirect::to('admin/category/add-new');
		}
		
		$list= Categories::dropdown();

		$data['parent']=$list;
		
		$items = categories::tree();
		return View::make('admin.addcategory',$data);
		
		
	}
	
	public function managecategory(){
		$categories = Categories::getcategories();
		$data['allCategories']= $categories;
		return View::make('admin.managecategory', $data);
	}
	
	public function categoryChangeStatus()
	{			
		$input = Input::only('id', 'status');
		$userstatus= DB::table('categories')
            ->where('id', $input['id'])
            ->update(['active' => $input['status']]);
          		
	}
	public function categoryDelete()
	{			
		$input = Input::only('id');
		$userstatus= DB::table('categories')
            ->where('id', $input['id'])
            ->delete();
          		
	}
	
	public function categoryView($id)
	{		
		$data['categoryId']= $id;	
		
		$data['categoryData']= Categories:: findcategory($id);
		
		return View::make('admin.categoriesView', $data);
          		
	}
	
	public function categoryEdit($id)
	{	
				
		if (Request::isMethod('post'))
		{
			
		$data = Input::all();
		$data = Input::except(array('_token'));
		
		
		DB::table('categories')->where('id',$data['id'])->update($data);
		return Redirect::to('admin/category/manage');
		
		}
		
		$categoryData = Categories::findcategory($id);
		
		foreach($categoryData as $cdata){
			$category= $cdata;
		}
		
		$list= Categories::dropdown();
		$data['parent']=$list;

		
		return View::make('admin.categoriesEdit',$data)->with('category', $category);
		
          		
	}
	
	///////////////////////////////////////CMS Management 
	public function addnewpage(){
		
		if (Request::isMethod('post'))
		{
		$data = Input::all();
		//echo '<pre>'; print_r($data); die();
		$data['created']= date('Y-m-d H:i:s');
		
		$data = Input::except(array('_token','_wysihtml5_mode','image','deleteimage','hiddenheaderimage','hiddenfeaturedImage'));
	
			
		if(Input::file('featuredImage')!==null){
			$path_parts = pathinfo(Input::file('featuredImage')->getClientoriginalName());
			$file = array('file' => Input::file('featuredImage'),
			'file_name' => Input::file('featuredImage')->getClientoriginalName(),
			'extension' => Input::file('featuredImage')->getClientOriginalExtension());	
			
			$rules = array('file' => 'required|max:7941905',
			'extension'  => 'required|in:png,jpg,jpeg,gif',
			'file_name' => 'required'
			); 
				
			$validator = Validator::make($file, $rules);
			
			if ($validator->fails()) {
			Session::flash('message', 'Please check the file type and size of the file.');
			Session::flash('alert-class', 'alert-danger'); 
			return Redirect::to("admin/cms-pages/add-new");
			
			} else {
			$path_parts = pathinfo(Input::file('featuredImage')->getClientoriginalName());
		
			if (Input::file('featuredImage')->isValid()) {
	
			$image = Input::file('featuredImage');
	
			$extension = $image->getClientOriginalExtension(); // getting image extension
					
				
			$filename = $image->getClientOriginalName();
			$fileName = $path_parts['filename'].'320x170.'.$extension; 
			$fileName1 = $path_parts['filename'].'380x220.'.$extension; 
			$fileName2 = $path_parts['filename'].'710x320.'.$extension; 
			$fileName3 = $path_parts['filename'].'1170x300.'.$extension; 
			
			 
			 Image::make($image->getRealPath())->resize(320, 170)->save('media/CMSPages/'.$fileName);
			 Image::make($image->getRealPath())->resize(380, 220)->save('media/CMSPages/'.$fileName1);
			 Image::make($image->getRealPath())->resize(710, 320)->save('media/CMSPages/'.$fileName2);
			 Image::make($image->getRealPath())->resize(1170, 300)->save('media/CMSPages/'.$fileName3);
			 Image::make($image->getRealPath())->save('media/CMSPages/'.$filename);
			 
			$data['featuredImage']= $path_parts['filename'];
			$data['ext']= $extension;	
									
			}
				
					
			}
		}else{
		
			$data['featuredImage']= '';
			$data['ext']= '';
			
		}
		
		
		if(Input::file('headerimage')!==null){
			$headerimage_parts = pathinfo(Input::file('headerimage')->getClientoriginalName());
			$file = array('file' => Input::file('headerimage'),
			'headerimage_parts' => Input::file('headerimage')->getClientoriginalName(),
			'headerext' => Input::file('headerimage')->getClientOriginalExtension());	
			
			$hrules = array('file' => 'required|max:7941905',
			'extension'  => 'required|in:png,jpg,jpeg,gif',
			'file_name' => 'required'
			); 
				
			$hvalidator = Validator::make($file, $hrules);
			
						
			$headerimage_parts = pathinfo(Input::file('headerimage')->getClientoriginalName());
		
			if (Input::file('headerimage')->isValid()) {
	
			$himage = Input::file('headerimage');
	
			$headerext = $himage->getClientOriginalExtension(); // getting image extension
					
				
			
			$headerimage1 = $headerimage_parts['filename'].'320x170.'.$headerext; // renameing image
			$headerimage2 = $headerimage_parts['filename'].'1680x600.'.$headerext; // renameing image
			$headerimage = $himage->getClientOriginalName();
		
			Image::make($himage->getRealPath())->resize(320, 170)->save('media/headerImage/'.$headerimage1);
			Image::make($himage->getRealPath())->resize(1680, 600)->save('media/headerImage/'.$headerimage2);
			Image::make($himage->getRealPath())->save('media/headerImage/'.$headerimage);

			 
			 
			 $data['headerimage']= $headerimage_parts['filename'];
			 $data['headerext']= $headerext;	 
									
				}
						
			}else{
			$data['headerimage']= '';
			$data['headerext']= '';
			
		}
		
		
		DB :: table('cmspages')->insert($data); 
		Session::flash('message', 'The '.$data['title'].' page has been created successfully.');
		
		Session::flash('alert-class', 'alert-success'); 
		return Redirect::to('admin/cms-pages/add-new');
		}
		
		
		$lists= Cmspages::dropdown();
		
		$data['categories']=$lists;
		
		return View::make('admin.addpage',$data);		
		
	}
	
	public function managepages(){
		$managepages = Cmspages::getpages();
		
		$data['allpages']= $managepages;
		return View::make('admin.managepages', $data);
	}
	
	public function pageChangeStatus()
	{			
		$input = Input::only('id', 'status');
		$userstatus= DB::table('cmspages')
            ->where('id', $input['id'])
            ->update(['status' => $input['status']]);
          		
	}
	public function pageDelete()
	{			
		$input = Input::only('id');
		$userstatus= DB::table('cmspages')
            ->where('id', $input['id'])
            ->delete();
          		
	}
	
	public function pageView($id)
	{		
		$data['pageId']= $id;	
		
		$data['pageData']= Cmspages:: findpagedata($id);
		
		return View::make('admin.pageView', $data);
          		
	}
	
	public function pageEdit($id)
	{	

		if (Request::isMethod('post'))
		{
			
	
		$data = Input::all();
		$data = Input::except(array('_token','_wysihtml5_mode','image','deleteimage','hiddenheaderimage','hiddenfeaturedImage'));
	
			
		if(Input::file('featuredImage')!==null){
			$path_parts = pathinfo(Input::file('featuredImage')->getClientoriginalName());
			$file = array('file' => Input::file('featuredImage'),
			'file_name' => Input::file('featuredImage')->getClientoriginalName(),
			'extension' => Input::file('featuredImage')->getClientOriginalExtension());	
			
			$rules = array('file' => 'required|max:7941905',
			'extension'  => 'required|in:png,jpg,jpeg,gif',
			'file_name' => 'required'
			); 
				
			$validator = Validator::make($file, $rules);
			
			if ($validator->fails()) {
			Session::flash('message', 'Please check the file type and size of the file.');
			Session::flash('alert-class', 'alert-danger'); 
			return Redirect::to('admin/cms-pages/edit/'.$id);
			
			} else {
			$path_parts = pathinfo(Input::file('featuredImage')->getClientoriginalName());
		
			if (Input::file('featuredImage')->isValid()) {
	
			$image = Input::file('featuredImage');
	
			$extension = $image->getClientOriginalExtension(); // getting image extension
					
				
			$filename = $image->getClientOriginalName();
			$fileName = $path_parts['filename'].'320x170.'.$extension; 
			$fileName1 = $path_parts['filename'].'380x220.'.$extension; 
			$fileName2 = $path_parts['filename'].'710x320.'.$extension; 
			$fileName3 = $path_parts['filename'].'1170x300.'.$extension; 
			
			 
			 Image::make($image->getRealPath())->resize(320, 170)->save('media/CMSPages/'.$fileName);
			 Image::make($image->getRealPath())->resize(380, 220)->save('media/CMSPages/'.$fileName1);
			 Image::make($image->getRealPath())->resize(710, 320)->save('media/CMSPages/'.$fileName2);
			 Image::make($image->getRealPath())->resize(1170, 300)->save('media/CMSPages/'.$fileName3);
			 Image::make($image->getRealPath())->save('media/CMSPages/'.$filename);
			 
			$data['featuredImage']= $path_parts['filename'];
			$data['ext']= $extension;	
									
			}
				
					
			}
		}else{
			if(Input::get('deleteimage')=='on'){
			$data['featuredImage']= '';
			$data['ext']= '';
			}else{
			$path_parts = pathinfo(Input::get('image'));
			$data['featuredImage']= $path_parts['filename'];
			$data['ext']= $path_parts['extension'];
			}
		}
		
		
		if(Input::file('headerimage')!==null){
			$headerimage_parts = pathinfo(Input::file('headerimage')->getClientoriginalName());
			$file = array('file' => Input::file('headerimage'),
			'headerimage_parts' => Input::file('headerimage')->getClientoriginalName(),
			'headerext' => Input::file('headerimage')->getClientOriginalExtension());	
			
			$hrules = array('file' => 'required|max:7941905',
			'extension'  => 'required|in:png,jpg,jpeg,gif',
			'file_name' => 'required'
			); 
				
			$hvalidator = Validator::make($file, $hrules);
			
						
			$headerimage_parts = pathinfo(Input::file('headerimage')->getClientoriginalName());
		
			if (Input::file('headerimage')->isValid()) {
	
			$himage = Input::file('headerimage');
	
			$headerext = $himage->getClientOriginalExtension(); // getting image extension
					
				
			
			$headerimage1 = $headerimage_parts['filename'].'320x170.'.$headerext; // renameing image
			$headerimage2 = $headerimage_parts['filename'].'420x220.'.$headerext; // renameing image
			$headerimage3 = $headerimage_parts['filename'].'1680x600.'.$headerext; // renameing image
			$headerimage = $himage->getClientOriginalName();
		
			Image::make($himage->getRealPath())->resize(320, 170)->save('media/headerImage/'.$headerimage1);
			Image::make($himage->getRealPath())->resize(420, 220)->save('media/headerImage/'.$headerimage2);
			Image::make($himage->getRealPath())->resize(1680, 600)->save('media/headerImage/'.$headerimage3);
			Image::make($himage->getRealPath())->save('media/headerImage/'.$headerimage);

			 
			 
			 $data['headerimage']= $headerimage_parts['filename'];
			 $data['headerext']= $headerext;	 
									
				}
				
			
			}else{
			if(Input::get('deleteheaderimage')=='on'){
			$data['headerimage']= '';
			$data['headerext']= '';
			}else{
			$hpath_parts = pathinfo(Input::get('headerimage'));
			$data['headerimage']= $hpath_parts['filename'];
			$data['headerext']= $hpath_parts['extension'];
			}
		}
		//echo '<pre>';print_r($data); die;
		
		DB::table('cmspages')->where('id',$id)->update($data);
		Session::flash('message', 'The CMS Page has been updated successfully.');
		
		Session::flash('alert-class', 'alert-success'); 
		return Redirect::to('admin/cms-pages/edit/'.$id);
		
		}
		
		$pagedata = Cmspages::findpagedata($id);
		
		foreach($pagedata as $pdata){
			$page= $pdata;
		}
		
		$parentList= DB:: table('categories')->where('id','=',$page->category_id)->get();
		
		foreach($parentList as $list){
		$lists[$list->id]= $list->name; 	
		}
		$data['categories']=$lists;
		
		
		return View::make('admin.pageEdit',$data)->with('page', $page);
		
          		
	}


///////////////////////////////////// Blogs Management




	public function addnewblog(){
				
		if (Request::isMethod('post'))
		{
		$data = Input::all();
	
		$data['created']= date('Y-m-d H:i:s');
		
		$data = Input::except(array('_token','_wysihtml5_mode','image','deleteimage','hiddenheaderimage','hiddenfeaturedImage'));
	
			
		if(Input::file('featuredImage')!==null){
			$path_parts = pathinfo(Input::file('featuredImage')->getClientoriginalName());
			$file = array('file' => Input::file('featuredImage'),
			'file_name' => Input::file('featuredImage')->getClientoriginalName(),
			'extension' => Input::file('featuredImage')->getClientOriginalExtension());	
			
			$rules = array('file' => 'required|max:7941905',
			'extension'  => 'required|in:png,jpg,jpeg,gif',
			'file_name' => 'required'
			); 
				
			$validator = Validator::make($file, $rules);
			
			if ($validator->fails()) {
			Session::flash('message', 'Please check the file type and size of the file.');
			Session::flash('alert-class', 'alert-danger'); 
			return Redirect::to("admin/cms-pages/add-new");
			
			} else {
			$path_parts = pathinfo(Input::file('featuredImage')->getClientoriginalName());
		
			if (Input::file('featuredImage')->isValid()) {
	
			$image = Input::file('featuredImage');
	
			$extension = $image->getClientOriginalExtension(); // getting image extension
					
				
			$filename = $image->getClientOriginalName();
			$fileName = $path_parts['filename'].'320x170.'.$extension; 
			$fileName1 = $path_parts['filename'].'380x220.'.$extension; 
			$fileName2 = $path_parts['filename'].'710x320.'.$extension; 
			$fileName3 = $path_parts['filename'].'1170x300.'.$extension; 
			
			 
			 Image::make($image->getRealPath())->resize(320, 170)->save('media/Blogs/'.$fileName);
			 Image::make($image->getRealPath())->resize(380, 220)->save('media/Blogs/'.$fileName1);
			 Image::make($image->getRealPath())->resize(710, 320)->save('media/Blogs/'.$fileName2);
			 Image::make($image->getRealPath())->resize(1170, 300)->save('media/Blogs/'.$fileName3);
			 Image::make($image->getRealPath())->save('media/Blogs/'.$filename);
			 
			$data['featuredImage']= $path_parts['filename'];
			$data['ext']= $extension;	
									
			}
				
					
			}
		}else{
			if(Input::get('deleteimage')=='on'){
			$data['featuredImage']= '';
			$data['ext']= '';
			}else{
			$path_parts = pathinfo(Input::get('image'));
			$data['featuredImage']= $path_parts['filename'];
			$data['ext']= $path_parts['extension'];
			}
		}
			
		DB :: table('blogs')->insert($data); 
		Session::flash('message', 'The '.$data['title'].' page has been created successfully.');
		
		Session::flash('alert-class', 'alert-success'); 
		return Redirect::to('admin/blog/add-new');
		}
		
		
		$lists= Cmspages::dropdown();
		
		$data['categories']=$lists;
		
		return View::make('admin.addpost',$data);		
		
	}

	public function manageblogs(){

		$manageblogs = Blogs::getblogs();
		
		$data['allblogs']= $manageblogs;
		return View::make('admin.manageblogs', $data);
	}

	public function blogView($id)
	{		
		
		$data['blogId']= $id;	
		
		$data['blogData']= Blogs::findblogdata($id);
		
		return View::make('admin.blogView', $data);
          		
	}


	public function blogEdit($id)
	{	

		if (Request::isMethod('post'))
		{
			
	
		$data = Input::all();

		$data = Input::except(array('_token','_wysihtml5_mode','image','deleteimage','hiddenheaderimage','hiddenfeaturedImage'));
	
			
		if(Input::file('featuredImage')!==null){
			$path_parts = pathinfo(Input::file('featuredImage')->getClientoriginalName());
			$file = array('file' => Input::file('featuredImage'),
			'file_name' => Input::file('featuredImage')->getClientoriginalName(),
			'extension' => Input::file('featuredImage')->getClientOriginalExtension());	
			
			$rules = array('file' => 'required|max:7941905',
			'extension'  => 'required|in:png,jpg,jpeg,gif',
			'file_name' => 'required'
			); 
				
			$validator = Validator::make($file, $rules);
			
			if ($validator->fails()) {
			Session::flash('message', 'Please check the file type and size of the file.');
			Session::flash('alert-class', 'alert-danger'); 
			return Redirect::to('admin/blog/edit/'.$id);
			
			} else {
			$path_parts = pathinfo(Input::file('featuredImage')->getClientoriginalName());
		
			if (Input::file('featuredImage')->isValid()) {
	
			$image = Input::file('featuredImage');
	
			$extension = $image->getClientOriginalExtension(); // getting image extension
					
				
			$filename = $image->getClientOriginalName();
			$fileName = $path_parts['filename'].'320x170.'.$extension; 
			$fileName1 = $path_parts['filename'].'380x220.'.$extension; 
			$fileName2 = $path_parts['filename'].'710x320.'.$extension; 
			$fileName3 = $path_parts['filename'].'1170x300.'.$extension; 
			
			 
			 Image::make($image->getRealPath())->resize(320, 170)->save('media/Blogs/'.$fileName);
			 Image::make($image->getRealPath())->resize(380, 220)->save('media/Blogs/'.$fileName1);
			 Image::make($image->getRealPath())->resize(710, 320)->save('media/Blogs/'.$fileName2);
			 Image::make($image->getRealPath())->resize(1170, 300)->save('media/Blogs/'.$fileName3);
			 Image::make($image->getRealPath())->save('media/Blogs/'.$filename);
			 
			$data['featuredImage']= $path_parts['filename'];
			$data['ext']= $extension;	
									
			}
				
					
			}
		}else{
			if(Input::get('deleteimage')=='on'){
			$data['featuredImage']= '';
			$data['ext']= '';
			}else{
			$path_parts = pathinfo(Input::get('image'));
			$data['featuredImage']= $path_parts['filename'];
			$data['ext']= $path_parts['extension'];
			}
		}
		
		
		DB::table('blogs')->where('id',$id)->update($data);
		Session::flash('message', 'The Blog has been updated successfully.');
		
		Session::flash('alert-class', 'alert-success'); 
		return Redirect::to('admin/blog/edit/'.$id);
		
		}
		
		$blogdata = Blogs::findblogdata($id);
		
		foreach($blogdata as $bdata){
			$blog= $bdata;
		}
		
		$parentList= DB:: table('categories')->where('id','=',$blog->category_id)->get();
		
		foreach($parentList as $list){
		$lists[$list->id]= $list->name; 	
		}
		$data['categories']=$lists;
		
		
		return View::make('admin.blogEdit',$data)->with('blog', $blog);
		
          		
	}

	public function blogChangeStatus()
	{			
		$input = Input::only('id', 'status');
		$userstatus= DB::table('blogs')
            ->where('id', $input['id'])
            ->update(['status' => $input['status']]);
          		
	}

	public function blogDelete()
	{			
		$input = Input::only('id');
		$userstatus= DB::table('blogs')
            ->where('id', $input['id'])
            ->delete();
          		
	}

	public function manageblogscat(){

		$manageblogscat = Blogs::manageblogscat();
		
		//echo '<pre>'; print_r($manageblogscat); die();
		$data['allblogscat']= $manageblogscat;
		return View::make('admin.manageblogscat', $data);
	}
	
	public function addblogcat(){

		//die('here');
		$data = Input::except('_token');

		//echo '<pre>'; print_r($data); die();
		$data['active'] =1;
		$data['created'] = date('Y-m-d H:i:s');

		DB :: table('blogcategories')->insert($data); 
		Session::flash('message', 'The Blog category has been created successfully.');
		
		Session::flash('alert-class', 'alert-success'); 

		$manageblogscat = Blogs::manageblogscat();
		
		//echo '<pre>'; print_r($manageblogscat); die();
		$data['allblogscat']= $manageblogscat;
		return View::make('admin.manageblogscat', $data);
	}

	public function blogcatChangeStatus()
	{			
	//die('here');
		$input = Input::only('id', 'active');
		$userstatus= DB::table('blogcategories')
            ->where('id', $input['id'])
            ->update(['active' => $input['active']]);
          		
	} 


	public function blogcatDelete()
	{			
		$input = Input::only('id');
		$userstatus= DB::table('blogcategories')
            ->where('id', $input['id'])
            ->delete();
          		
	}

	public function blogcatView($id)
	{		
		
		$data['blogcatId']= $id;	
		
		$data['blogcatData']= Blogs::findblogcatdata($id);
		
		return View::make('admin.blogcatView', $data);
          		
	}

		public function blogcatEdit($id)
	{	

		if (Request::isMethod('post'))
		{
		$data = Input::except(array('_token'));
		
		
		DB::table('blogcategories')->where('id',$id)->update($data);
		Session::flash('message', 'The Blog category has been updated successfully.');
		
		Session::flash('alert-class', 'alert-success'); 
		return Redirect::to('admin/blogcat/edit/'.$id);
		
		}
		
		$blogcatData = Blogs::findblogcatdata($id);
		
		foreach($blogcatData as $bdata){
			$blogcat= $bdata;
		}
		
		
		return View::make('admin.blogcatEdit')->with('blogcat', $blogcat);
		
          		
	}




///////////////////////////////////// Statement Management




	public function managestatement(){

		$manageblogscat = Statement::managestatement();
		
		//echo '<pre>'; print_r($manageblogscat); die();
		$data['allstatements']= $manageblogscat;
		return View::make('admin.managestatement', $data);
	}

	public function statementChangeStatus()
	{			
	//die('here');
		$input = Input::only('id', 'status');
		$userstatus= DB::table('statementAnalysis')
            ->where('id', $input['id'])
            ->update(['status' => $input['status']]);
          		
	} 

	public function statementView($id)
	{		
		
		$data['statementId']= $id;	
		
		$data['statementData']= Statement::findstatementdata($id);
		
		return View::make('admin.statementView', $data);
          		
	}

	public function statementDelete()
	{			
		$input = Input::only('id');
		$userstatus= DB::table('statementAnalysis')
            ->where('id', $input['id'])
            ->delete();
          		
	}
}
