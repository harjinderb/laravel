@extends('layouts.error')


@section('title')
Page not found - 404 Error
@stop

@section('content')
<div class="col-md-2 col-md-offset-5 col-sm-6 col-sm-offset-3 col-xs-offset-1">
<a href="{{URL::to('/')}}" class="logo pull-left"><img src="{{URL :: to('assets/img/logo.png') }}" data-src="{{URL :: to('assets/img/logo.png') }}" data-src-retina="{{URL :: to('assets/img/logo.png') }}" style="height: auto; width: 160px ! important;" alt=""/></a>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10 m-t-50">
   <div class="error-container" >
    <div class="error-main">
      <div class="error-number"> 404 </div>
      <div class="error-description" > We seem to have lost you in the clouds. </div>
      <div class="error-description-mini"> The page your looking for is not here </div>
      <br>
      
      <br>
      <button class="btn btn-primary btn-cons" type="button" onclick="window.history.go(-1);">Back</button>
    </div>
    </div>
  
  </div>
</div>

@endsection



