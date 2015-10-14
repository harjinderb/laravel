@extends('layouts.loginReg')

@section('adminHead')
@extends('layouts.adminHead')
@stop

@section('content')
<div class="row login-container column-seperation">  
        <div class="col-md-5 col-md-offset-1">
          <h2>Sign in to webarch</h2>
          <p>Use Facebook, Twitter or your email to sign in.<br>
            <a href="{{URL :: to('user/register') }}">Sign up Now!</a> for a webarch account,It's free and always will be..</p>
          <br>

		   <a href="{{URL:: to('user/register')}}" class="btn btn-block btn-success col-md-8"> <span class="pull-left"><i class="icon-facebook"></i></span> <span class="bold">Sign up Now!</span> </a>
		   <!-- <a href="{{URL:: to('login/fb')}}" class="btn btn-block btn-info col-md-8"> <span class="pull-left"><i class="icon-facebook"></i></span> <span class="bold">Login with Facebook</span> </a> -->
		 
        </div>
        <div class="col-md-5 ">
		@if(Session::has('message'))
		<div class="alert {{ Session::get('alert-class') }}"><button data-dismiss="alert" class="close"></button>
			{{ Session::get('message') }}
			</div>
			@endif	
			
		{!! Form::open(array('url'=> 'users/login','id'=>'login-form','class'=>'login-form')) !!}
                     
		 <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">Username</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					{!! Form::text('username','', ['class'=>'form-control','id'=>'username','value'=>'']) !!}
					                            
				</div>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Password</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="password" id="password" class="form-control">  
					
				</div>
            </div>
          </div>
          </div>
		  <!--div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Select your role</label>
              <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					  <?php $roles = array('SU'=>'Super Admin','AR'=>'Agent Resources','U'=>'Member'); ?>
					     
					{!! Form::select('role',$roles,null,array('id'=>'roles','class'=>'form-control select2')) !!}                          
				</div>
            </div>
          </div>
          </div-->
		 
		  <div class="row">
          <div class="control-group  col-md-10">
            <div class="checkbox checkbox check-success"> <a href="#">Trouble login in?</a>&nbsp;&nbsp;
              <input type="checkbox" id="checkbox1" value="1">
              <label for="checkbox1">Keep me reminded </label>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <button class="btn btn-primary btn-cons pull-right SignIn" type="submit">Login</button>
            </div>
          </div>
		{!! Form::close() !!}
		  
        </div>
    <script>
   
		if (localStorage.chkbx && localStorage.chkbx != '' && (localStorage.usrname!=undefined || localStorage.usrname!='undefined')) {
		jQuery('#checkbox1').attr('checked', 'checked');

		jQuery('#username').val(localStorage.usrname);
		jQuery('#password').val(localStorage.pass);

		} else {
		jQuery('#checkbox1').removeAttr('checked');
		jQuery('#username').val('');
		jQuery('#password').val('');
		}

		$('#checkbox1').click(function() {

		if (jQuery('#checkbox1').is(':checked')) {
			// save username and password
			localStorage.usrname = jQuery('#username').val();
			localStorage.pass = jQuery('#password').val();
			localStorage.chkbx = jQuery('#checkbox1').val();
		} else {
			localStorage.usrname = '';
			localStorage.pass = '';
			localStorage.chkbx = '';
		}
		});

		$('.SignIn').click(function() {
		var newUser=  jQuery('#username').val();
		var newPass = jQuery('#password').val();
		if (jQuery('#checkbox1').is(':checked') && localStorage.usrname != newUser){
						
			localStorage.usrname = newUser;
			localStorage.pass = newPass;
			localStorage.chkbx = jQuery('#checkbox1').val();
		} else {
			localStorage.usrname = localStorage.usrname;
			localStorage.pass = localStorage.pass;
			localStorage.chkbx = localStorage.chkbx;
		}
		});

        </script> 
    
  </div>

@endsection

