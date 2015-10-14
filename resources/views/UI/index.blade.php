@extends('layouts.UI')

@section('content')
<div class="section ">
	<div class="container">
		<div class="p-t-40 p-b-30">
		
			<h2 class="text-center">Call Us Today: <span class="semi-bold">(800) 863-5995</span> <a href="{{URL::to('contact_eps')}}" class="btn btn-green btn-lg  btn-large m-l-20 ">CONTACT US NOW</a></h2>
		</div>
	</div>
</div>	
<div class="section white ha-waypoint"  data-animate-down="ha-header-color" data-animate-up="ha-header-hide" >
		<div class="container">
		<div class="p-t-60">
		<div class="row">
		<div class="col-md-12 feature-list ">
			{{--*/ $grid = App\UI::gridData(24); $i=1; /*--}}
			@foreach($grid as $grid)
			@if($i <= 3)
			<div class="col-md-4 " data-ride="animated" data-animation="fadeIn" data-delay="300" id="{{$grid->id}}">
			<h4 class="title">{{$grid->heading}}</h4>
			{{  str_limit($grid->short_content,200)}}.. <a href="{{URL::to($grid->slug)}}" class="text-info" style="float:right;">read more <i class="fa fa-angle-double-right"></i></a>
			</div>
			@elseif($i==4)
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-md-12 feature-list">
			@elseif($i<=7)
			<div class="col-md-4 " data-ride="animated" data-animation="fadeIn" data-delay="300" id="{{$grid->id}}">
			<h4 class="title">{{$grid->heading}}</h4>
			{{  str_limit($grid->short_content,200) }}.. <a href="{{URL::to($grid->slug)}}" class="text-info" style="float:right;">read more <i class="fa fa-angle-double-right"></i></a>
			</div>
			@endif
			{{--*/$i++;/*--}}
			@endforeach
		
		<div class="clearfix"></div>
		</div>
		</div>
		<div class="section relative">
			<div class="row">

				<img src="{{ URL::to('assets/front/img/mobile.png') }}" alt="" class="resize p-t-60 col-md-4 hidden-xs" style="" data-ride="animated" data-animation="fadeInUp" data-delay="500">
		
		
				<img src="{{ URL::to('assets/front/img/ipadFP.png') }}"	alt="" class="resize p-t-60 col-md-8 push-bottom hidden-sm hidden-xs visible-lg visible-md" data-ride="animated" data-animation="fadeInRight" data-delay="800" style="right:-4%">			
			
		
			</div>
		</div>
			<div class="clearfix"></div>
		</div>
		</div>
		</div>

<div class="section grey">
	<div class="container">
	  <div class="p-t-40 p-b-50 ">
		<div class="row">
			<div class="col-md-12">
			  <h2><span class="normal">Featured Products</span><br>
			  Get more from services offered by Electronic Payment Systems.<a href="{{URL::to('services')}}" class="btn btn-green btn-cons m-l-30">View All</a></h2>
			  
			</div>
		</div>
		<br>
		<div class="row feature-list">		
			
			{{--*/ $grids = App\UI::gridData(11); $j=1; /*--}}
			@foreach($grids as $grids)
			@if($j <= 3)
			<div class="col-md-4 " data-ride="animated" data-animation="fadeIn" data-delay="300" id="{{$grids->id}}">
			<div class="views-field views-field-field-image"> 
			<div class="field-content">
			<a href="{{ URL::to($grids->slug) }}">
			<img width="100%"  alt="{{$grids->heading}}" src="{{URL::to('media/CMSPages')}}/{{$grids->featuredImage}}380x215.{{$grids->ext}}" typeof="foaf:Image">
			</a>
			</div>
			</div>
			<h4 class="title">{{$grids->heading}}</h4>
			{{  str_limit($grids->short_content,200)}}.. <a href="{{URL::to($grids->slug)}}" class="text-info" style="float:right;">read more <i class="fa fa-angle-double-right"></i></a>
			</div>
			@elseif($j==4)
			</div>
			<br>
		<div class="row feature-list">	
			@elseif($j<=7)
			<div class="col-md-4 " data-ride="animated" data-animation="fadeIn" data-delay="300" id="{{$grids->id}}">
			<div class="views-field views-field-field-image"> 
			<div class="field-content">
			<a href="{{ URL::to($grids->slug) }}">
			<img width="100%"  alt="{{$grids->heading}}" src="{{URL::to('media/CMSPages')}}/{{$grids->featuredImage}}380x215.{{$grids->ext}}" typeof="foaf:Image">
			</a>
			</div>
			</div>
			<h4 class="title">{{$grids->heading}}</h4>
			{{  str_limit($grids->short_content,200) }}.. <a href="{{URL::to($grids->slug)}}" class="text-info" style="float:right;">read more <i class="fa fa-angle-double-right"></i></a>
			</div>
			@endif
			{{--*/$j++;/*--}}
			@endforeach
		
			<div class="clearfix"></div>
	
			</div>
		</div>
	</div>
</div>	
<div class="section white">
		<div class="container">
			<div class="p-t-50 p-b-50 ">
				<div class="p-b-30">

				<h2 class="text-center">Technology Partners</h2>
				<h4 class="text-center">EPS has partnered with some of the largest, most innovative companies in the industry to help you on your way.</h4>
				</div>
					<div class="row feature-list">
						<div class="col-md-3 ">	<div class="partners text-center hoverimg"><img src="{{ URL::to('media/partners/auth.png') }}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="200"></div></div>
						<div class="col-md-3 ">	<div class="partners text-center hoverimg"><img src="{{ URL::to('media/partners/cp.png') }}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="500"></div></div>
						<div class="col-md-3 ">	<div class="partners text-center hoverimg"><img src="{{ URL::to('media/partners/dv.png') }}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="800"></div></div>
						<div class="col-md-3 ">	<div class="partners text-center hoverimg"><img src="{{ URL::to('media/partners/vf.png') }}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="1000"></div></div>
						
					</div>		
				</div>
		</div>
</div>
<div class="section table-layout">	
			<div id="working-section" class="table-cell v-middle">	
				<div >
				<h2 class="text-white text-center custom-font no-margin">MILLIONS OF SATISFIED CUSTOMERS</h2>
				</div>
			</div>
</div>
<div class="section white">
		<div class="container">
			<div class="p-t-60 p-b-50">
			  <div id="testomonials" class="owl-carousel row">
				<div class="item">
					<div class="col-md-12">
						<h2 class="normal text-center">Dentist - Raleigh, NC</h2>
						<h4 class="text-center">
						Being a dentist I have always used Care Credit, and I have been turning away 3 or more patients almost every week. Now I can actually do business with everyone who comes into my clinic no matter how much credit they have or don't have. I’m glad to have found a payment plan to offer our patients so we can give them the dental care they need without having to worry about whether or not we will be getting paid. We love the program.
						</h4>
						<p class="text-center">Jessica S., Accounts Receivable</p>
					</div>
				</div>
				<div class="item">
					<div class="col-md-12">
						<h2 class="normal text-center">Tire & Rim Shop - Baltimore, MD</h2>
						<h4 class="text-center">
						We installed the EPS90 system 1 year ago and it has more than exceeded our expectations. We have a new motto now: "Everyone gets tires!" Not only have the overall sales of our tires have gone up, but our up-sells of rims has increased almost 30% in the past year.
						</h4>
						<p class="text-center">Don D</p>
					</div>
				</div>
				<div class="item">
					<div class="col-md-12">
						<h2 class="normal text-center">Remodeler - Boston, MA</h2>
						<h4 class="text-center">
						My company has been with Electronic Payment Systems for about 5 years. We have utilized MC/VS quite effectively in our business. About a year ago, our sales agent stopped by and introduced us to the EPS90 payment plan with no credit check needed. This has been a godsend. We sold over $100,000.00 in new jobs using the EPS90, our salespeople use a portable system for laptops while they are on location which makes our bidding & sales process extremely convenient. We are doing about 4 to 5 jobs a month where offering the EPS90 no credit check payment plan has been the deciding factor. We love you guys, Thank You!
						</h4>
						<p class="text-center">Frank D, Owner</p>
					</div>
				</div>
		</div>
	</div>
	</div>
</div>
@endsection


@section('moreJS')

@stop
