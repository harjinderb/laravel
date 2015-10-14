@extends('layouts.loginReg')

@extends('layouts.adminHead')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::to('/assets/css/custom.css') }}" />
<div class="row login-container column-seperation">  
        
        <div class="col-md-12">
			@if(Session::has('message'))
		<div class="alert {{ Session::get('alert-class') }}"><button data-dismiss="alert" class="close"></button>
			{{ Session::get('message') }}
			</div>
						<br>
			@endif	
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4><span class="semi-bold">User Registration</span></h4>
              <p id="showError" style="color:#f35958;"></p>
			  <p id="showSuccess" style="color:#0aa699;"></p>
             
            </div>
            <div class="grid-body no-border">
			{!! Form::open(array('url' => 'users/register','id'=>'userRegister','class'=>'form-no-horizontal-spacing','files'=>'true')) !!}
				
              <div class="row column-seperation">
                <div class="col-md-6">
                  <h4>Login Information</h4>    
                  <div class="row form-row">
                      <div class="col-md-12">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
						  {!! Form::text('username', '', ['class' => 'form-control','id'=>'Username','placeholder'=>'Username']) !!}
                      </div>
                      </div>
                    </div>        
                    <div class="row form-row">
                      <div class="col-md-6">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
						 {!! Form::text('FirstName', '', ['class'=>'form-control', 'id'=>'FirstName','placeholder'=>'First Name']) !!}
                      </div>
                      </div>
                      <div class="col-md-6">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
					 {!! Form::text('LastName', '', ['class'=>'form-control', 'id'=>'LastName','placeholder'=>'Last Name']) !!}
                      </div>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-6">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
						  <?php $list= array('Male' => 'Male', 'Female' => 'Female'); ?>
						{!! Form::select('Gender', $list, null, array('class'=>'form-control select2', 'id'=>'Gender')) !!}
                      </div>
                      </div>
                       <div class="input-append success date col-md-6 no-padding">
						   <div class="input-with-icon  right">                                       
							<i class=""></i>
						{!! Form::text('DateOfBirth', '', ['class'=>'form-control', 'id'=>'DateOfBirth','placeholder'=>'Date of Birth']) !!}
                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                        </div>
                        </div>
                    </div>
                    
                   
                    <div class="row form-row">
                      <div class="col-md-12">
						 <div class="input-with-icon  right">                                       
							<i class=""></i>  
					 {!! Form::text('email', '', ['class'=>'form-control', 'id'=>'Email','placeholder'=>'email@address.com']) !!}
					</div>
					</div>
                    </div>
                     <div class="row form-row">
                      <div class="col-md-6">
						   <div class="input-with-icon  right">                                       
							<i class=""></i>
					{!! Form::password('password', array('class'=>'form-control', 'id'=>'Password','placeholder'=>'Password')) !!}
					</div>
					</div>
                      <div class="col-md-6">
						   <div class="input-with-icon  right">                                       
							<i class=""></i>
					{!! Form::password('confirmPassword', array('class'=>'form-control', 'id'=>'confirmPassword','placeholder'=>'Confirm Password')) !!}
                      </div>
                      </div>
                    </div>
                  
                </div>
                <div class="col-md-6">
				
                  <h4>Postal Information</h4>
                  
                    <div class="row form-row">
                      <div class="col-md-12">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
					 {!! Form::text('Address', '', ['class'=>'form-control', 'id'=>'Address','placeholder'=>'Address']) !!}
                      </div>
                      </div>
                    </div>
                   
                    <div class="row form-row">
                      <div class="col-md-8">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
					 {!! Form::text('Country', '', ['class'=>'form-control', 'id'=>'Country','placeholder'=>'Country']) !!}
                      </div>
                      </div>
                      <div class="col-md-4">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
					 {!! Form::text('PostalCode', '', ['class'=>'form-control', 'id'=>'PostalCode','placeholder'=>'Postal Code']) !!}
                      </div>
                      </div>
                    </div>
                     <div class="row form-row">
                      <div class="col-md-6">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
					 {!! Form::text('State', '', ['class'=>'form-control', 'id'=>'State','placeholder'=>'State']) !!}
                      </div>
                      </div>
                            <div class="col-md-6">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
					 {!! Form::text('City', '', ['class'=>'form-control', 'id'=>'City','placeholder'=>'City']) !!}
					 </div>
					 </div>
              
                    </div>
                    <div class="row form-row">
                      <div class="col-md-4">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
					 {!! Form::text('CunCode', '', ['class'=>'form-control', 'id'=>'CunCode','placeholder'=>'+01']) !!} 
					  </div>
					  </div>
                      <div class="col-md-8">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
					 {!! Form::text('Mobile', '', ['class'=>'form-control', 'id'=>'Mobile','placeholder'=>'Mobile Number']) !!}
                      </div>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
						  <div class="input-with-icon  right">                                       
							<i class=""></i>
					{!! Form::text('Occupation', '', ['class'=>'form-control', 'id'=>'Occupation','placeholder'=>'Occupation']) !!}
                      </div>
                      </div>
                    </div>
                    <div class="row small-text">
					<p class="col-md-12"></p>
					</div>
             
                </div>
             <div class="col-md-12">
              <fieldset class="fieldset">
			<legend class="legend">Member Profile</legend>  
					
			 
			<div class="form-group col-md-12">
              <label class="col-md-2 control-label" for="inputPhone">Choose Photo:</label>
              <div class="col-md-2">
				<div class="upload-image">
				<div class="btn btn-info btn-gradient"><label for="AdImageFiles">+Add Photo</label> 
				<input type="file" title="Select Your Profile Image" id="member_photo_upload" style="width:62%;" class="upload" name="avtar">
				</div>
				
				</div>
				
				<div class="input-group col-md-4 pull-left">
				<div id="images"></div>
				</div>
				
             </div>
          
              <div class="col-md-1">
				<div style="font-size: 18px;" class="btn-group">or 
				</div>
				</div>
              <div class="col-md-2">
		
				<button type="button"  class="btn btn-info btn-gradient pull-right avtr"><span class="glyphicons glyphicons-old_man"></span> Choose avtar</button>	
				</div>
				</div>
				<div class="form-group avtarGroup col-md-12">
				<label class="col-md-2 control-label" for="inputPhone">Choose any one:</label>
				<div class="col-md-10">
				<?php for($av=1;$av<=18;$av++){ 
					echo '<div class="avtars"><input type="radio" name="avtar1" id="av'.$av.'" value="'.$av.'.jpeg">';
					?>
					<img src="{{URL :: to('/assets/img/avatars') }}/<?=$av;?>.jpeg"></div>
					<?php } ?>
				</div>
				</div>
            </div>
              </div>
				<div class="form-actions">
					<div class="pull-left">
					  <div class="checkbox checkbox check-success 	">
						<input type="checkbox" id="chkTerms" name="chkTerms" >
						<label for="chkTerms">I Here by agree on the Term and condition. </label>
					  </div>
					</div>
					<div class="pull-right">
						{!!  Form::submit('Save',['class'=>'btn btn-success btn-cons reload']); !!}
					    {!!  Form::reset('Reset',['class'=>'btn btn-danger btn-cons reload']); !!}
					 
					</div>
				  </div>
			{!! Form::close() !!}
            </div>
          </div>
        </div>
   </div>

@endsection

