@extends('layouts.homePage')

@section('metainfo')
<title>Credit Card Processing &amp; Business Solutions | EPS</title>
<meta content="EPS is one service for your entire business, from secure credit card processing - including Apple Pay &amp; EMV - to point of sale solutions. Sign up today!" name="description" />
<meta content="credit card processing, business solutions, accept credit card payments, accept nfc, apple pay, contactless" name="keywords" />
@stop
@section('extrastyle')
<style>
@media (min-width: 1292px) {
.home-page .hero .image, .home-page .banner .image {
    background-image: url("{!! URL::to('assets/front/img/banner.jpg')!!}");
    height: 500px;
    background-size: 100% 100%;
}
}
</style>
@stop

@section('content')
<section class="narrative">

<div class="content p-t-40 p-b-50 border-bottom">

<div class="lede align-center gap-bottom-small"><h3>Featured Products</h3>

<p>Get more from services offered by Electronic Payment Systems.</p>
</div>

<div class="grid-1-1-3 grid-row-gutter-space grid-row-equal-heights col-md-12">
{{--*/ $grids = App\UI::gridData(11); $j=1; /*--}}
			@foreach($grids as $grids)
			@if($j == 2 || $j==8 || $j==6)
			<div class="col-md-4 "  id="{{$grids->id}}">
			<a class="hotspot tile pad-none" data-link-action="Start Your Business" data-link-label="Narrative Section" href="{{ URL::to($grids->slug) }}">

			<div class="image"><img width="100%"  alt="{{$grids->heading}}" src="{{URL::to('media/headerImage')}}/{{$grids->headerimage}}320x170.{{$grids->headerext}}" typeof="foaf:Image"></div>

			<div class="copy pad-vert-small"><h4 class="gap-bottom-col">{{$grids->pagename}}</h4>

			<p>{{  str_limit($grids->short_content,50)}}.</p>
			</div></a>
			</div>
			
			@endif
			{{--*/$j++;/*--}}
			@endforeach


</div>
</div>
</section>

<section class="tools narrative" id="tools">
<div class="content pad-vert-medium">
<div class="lede align-center gap-bottom-small"><h3>It's Easy as 1, 2, 3</h3>

<p>Whether you’re just looking to take payments or take care of your entire business, we can help.</p>
</div>


<div class="grid-1-3 grid-row-small-space grid-row-equal-heights align-center m-t-50">

			
			<div class="start"><a class="hotspot no-padding p-b-30" data-link-action="Stand" data-link-label="Tools Section" href="#myModal" data-toggle="modal" data-target="#myModal">
			<div class="image"></div>
			<div class="product-text p-b-30"><h4 class="gap-bottom-col">Start Free</h4>
			<p class="product-desc">Get started and take payments anywhere with EPS.</p>
		
			</div>
			</a></div>
			
			<div class="run"><a class="hotspot no-padding p-b-30" data-link-action="Stand" data-link-label="Tools Section" href="#myModal">
			<div class="image"></div>
			<div class="product-text p-b-30"><h4 class="gap-bottom-col">Run Smoother</h4>
			<p class="product-desc">Manage all your day-to-day operations.</p>
			</div>
			</a></div>
			
			<div class="grow"><a class="hotspot no-padding p-b-30" data-link-action="Stand" data-link-label="Tools Section" href="#myModal">
			<div class="image"></div>
			<div class="product-text p-b-30"><h4 class="gap-bottom-col">Grow Faster</h4>
			<p class="product-desc">Expand with our marketing and financial services.</p>
			</div>
			</a></div>
		



</div>
</div>
</section>

<section class="verticals accent-section border-top" id="verticals">

<div class="content pad-vert-medium">

<div class="lede align-center gap-bottom-small"><h3>Industries We Serve</h3>

<p>From a register in your pocket to reports for all your locations, we have services for sellers of all types and sizes.</p>
</div>

<div class="grid-1-2-3 grid-row-gutter-space grid-row-equal-heights inverted col-md-12">


			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'coffee-shops' }}" data-link-label="Verticals Section" href="{{ URL::to('coffee-shops') }}">
			<div class="copy"><h6 class="upperspaced">{{'Coffee Shops'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'alt'}}" src="{{URL::to('media/headerImage')}}/{{'2003950-1366x768-[DesktopNexus.com]320x170.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'bookstore' }}" data-link-label="Verticals Section" href="{{ URL::to('bookstore') }}">
			<div class="copy"><h6 class="upperspaced">{{'Bookstore'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'alt'}}" src="{{URL::to('media/CMSPages/home')}}/{{'Bookstore.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'spa' }}" data-link-label="Verticals Section" href="{{ URL::to('spa') }}">
			<div class="copy"><h6 class="upperspaced">{{'Spa'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'alt'}}" src="{{URL::to('media/CMSPages/home')}}/{{'spa.jpeg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'hair-salon' }}" data-link-label="Verticals Section" href="{{ URL::to('hair-salon') }}">
			<div class="copy"><h6 class="upperspaced">{{'Hair Salon'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'alt'}}" src="{{URL::to('media/CMSPages/home')}}/{{'hair-saloon.jpeg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'gift-shop' }}" data-link-label="Verticals Section" href="{{ URL::to('gift-shop') }}">
			<div class="copy"><h6 class="upperspaced">{{'Gift Shop'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'alt'}}" src="{{URL::to('media/CMSPages/home')}}/{{'gift-shop.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'bakery' }}" data-link-label="Verticals Section" href="{{ URL::to('bakery') }}">
			<div class="copy"><h6 class="upperspaced">{{'Bakery'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'alt'}}" src="{{URL::to('media/CMSPages/home')}}/{{'bakery.jpeg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'restaurants' }}" data-link-label="Verticals Section" href="{{ URL::to('restaurants') }}">
			<div class="copy"><h6 class="upperspaced">{{'Restaurants'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'alt'}}" src="{{URL::to('media/CMSPages/home')}}/{{'restaurants.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'carwash' }}" data-link-label="Verticals Section" href="{{ URL::to('carwash') }}">
			<div class="copy"><h6 class="upperspaced">{{'Carwash'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'alt'}}" src="{{URL::to('media/CMSPages/home')}}/{{'car-wash.jpeg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'clothing-store' }}" data-link-label="Verticals Section" href="{{ URL::to('clothing-store') }}">
			<div class="copy"><h6 class="upperspaced">{{'Clothing Store'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'Clothing Store'}}" src="{{URL::to('media/CMSPages/home')}}/{{'maxresdefault.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'small-businesses' }}" data-link-label="Verticals Section" href="{{ URL::to('small-businesses') }}">
			<div class="copy"><h6 class="upperspaced">{{'Small Businesses'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'Small Businesses'}}" src="{{URL::to('media/CMSPages/home')}}/{{'Small-Business.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'retail-stores' }}" data-link-label="Verticals Section" href="{{ URL::to('retail-stores') }}">
			<div class="copy"><h6 class="upperspaced">{{'Retail'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'Retail'}}" src="{{URL::to('media/CMSPages/home')}}/{{'retail_store.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'service-professionals' }}" data-link-label="Verticals Section" href="{{ URL::to('service-professionals') }}">
			<div class="copy"><h6 class="upperspaced">{{'Service Professional'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'Service Professional'}}" src="{{URL::to('media/CMSPages/home')}}/{{'serviceProfessional.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'moto-solutions' }}" data-link-label="Verticals Section" href="{{ URL::to('moto-solutions') }}">
			<div class="copy"><h6 class="upperspaced">{{'MOTO'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'MOTO'}}" src="{{URL::to('media/CMSPages/home')}}/{{'moto.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'e-commerce' }}" data-link-label="Verticals Section" href="{{ URL::to('e-commerce') }}">
			<div class="copy"><h6 class="upperspaced">{{'E-Commerce'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'E-Commerce'}}" src="{{URL::to('media/CMSPages/home')}}/{{'e-commerce.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
			<div class="vertical services col-md-4">
			<a class="hotspot" data-link-action="{{ 'hospitality' }}" data-link-label="Verticals Section" href="{{ URL::to('hospitality') }}">
			<div class="copy"><h6 class="upperspaced">{{'Hospitality'}}</h6>
			</div>

			<div class="image"><img width="100%"  alt="{{'Hospitality'}}" src="{{URL::to('media/CMSPages/home')}}/{{'hospitality.jpg'}}" typeof="foaf:Image"></div>
			</a>
			</div>
			
</div>
</div>
</section>

<section class="sales-support border-top" id="sales-support">
<div class="content pad-vert-medium">
<div class="grid-1-2 grid-row-gutter-space grid-row-equal-heights">
<div class="item">
<a class="tile hotspot pad-small" data-link-action="Support Center" data-link-label="Sales &amp; Support Section" href="#myModal" data-toggle="modal" data-target="#myModal">
<div class="icon"><svg class="icon-80x80 icon-themed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" width="80" height="80">

<path fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M6.9,23.6l-1.8-8.6c-1.2-5.9,4-11,9.9-9.9l8.8,1.7" />

<path fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M23.7,73.2l-8.8,1.7c-5.9,1.2-11-4-9.9-9.9l1.8-8.6" />

<path fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M73.3,56.1l1.7,8.9c1.2,5.9-4,11-9.9,9.9l-8.8-1.8" />

<path fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M56.3,6.8l8.8-1.8c5.9-1.2,11,4,9.9,9.9l-1.7,8.9" />
  <circle fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="40" cy="40" r="37" />
  <circle fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="40" cy="40" r="18" />

<line fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="47.8" y1="4.8" x2="44.1" y2="21.5" />

<line fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="32.2" y1="4.8" x2="35.9" y2="21.5" />

<line fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="4.8" y1="32.2" x2="21.5" y2="35.9" />

<line fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="4.8" y1="47.8" x2="21.5" y2="44.1" />

<line fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="32.2" y1="75.2" x2="35.9" y2="58.5" />

<line fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="47.8" y1="75.2" x2="44.1" y2="58.5" />

<line fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="75.2" y1="47.8" x2="58.5" y2="44.1" />

<line fill="none" stroke="#2E3B4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="75.2" y1="32.2" x2="58.5" y2="35.9" />
</svg>

</div>

<div class="copy"><h4 class="gap-none">Get Started Today.</h4>

<p>Your FREE statement analysis can show you how much you can save with EPS.   .</p>

<span class="arrow">Click Here to Start.</span>
</div></a>
</div>

<div class="item">
<a class="tile hotspot pad-small" data-link-action="Security" data-link-label="Sales &amp; Support Section" target="_blank" href="credit-card-processing-solutions">
<div class="icon"><svg height="80" width="80" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg" class="icon-80x80 icon-themed">
  <path d="M56.4,61.3 C66.9,60,66.4,43,74.9,43" stroke-miterlimit="10" stroke-linejoin="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <path d="M29.3,55.7 C39.9,56,41.9,62,50.4,61.3" stroke-miterlimit="10" stroke-linejoin="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <path d="M4.9,66 c8.5,0,7-8,18.4-10.1" stroke-miterlimit="10" stroke-linejoin="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <circle r="3" cy="56" cx="26.1" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <circle r="3" cy="61" cx="53.1" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <path d="M62.9,31c0,5.5-4.5,10-10,10c-5.5,0-10-4.5-10-10c0-5.5,4.5-10,10-10c0,2.9,0,10,0,10S59.3,31,62.9,31z" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <path d="M66.9,27c0-5.5-4.5-10-10-10c0,3.6,0,4.5,0,10H66.9z" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <path d="M75,71c0,2.2-1.8,4-4,4H9c-2.2,0-4-1.8-4-4V9 c0-2.2,1.8-4,4-4h62c2.2,0,4,1.8,4,4V71z" stroke-miterlimit="10" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <polyline points="22.9,41 22.9,19 16.9,19 16.9,41 34.9,41 34.9,25 28.9,25 28.9,41" stroke-miterlimit="10" stroke-linejoin="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <polyline points="22.9,41 22.9,31 28.9,31 28.9,41" stroke-miterlimit="10" stroke-linejoin="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
</svg>

</div>
<div class="copy"><h4 class="gap-none">Merchant Services.</h4>
<p>Learn how to get started accepting credit card payments anywhere with our unique products and customized merchant service solutions giving you a competitive advantage while saving you money. .</p>
<span class="arrow">Get Your Merchant Accounty
</span>
</div></a>
</div>

<div class="item">
<a class="tile hotspot pad-small" data-link-action="Pricing" data-link-label="Sales &amp; Support Section" target="_blank" href="mobile-credit-card-processing">
<div class="icon"><svg height="80" width="80" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg" class="icon-80x80 icon-themed">
  <path d="M38.3,78.5C39.1,78.8,40,79,41,79h30 c4.4,0,8-3.6,8-8V9c0-4.4-3.6-8-8-8H41c-4.4,0-8,3.6-8,8" stroke-miterlimit="10" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <path d="M36.2,9c2.6,0,4.8,2.2,4.8,5v60c0,2.8-2.1,5-4.8,5 H5.8C3.1,79,1,76.7,1,74V14c0-2.8,2.1-5,4.8-5H36.2z" stroke-miterlimit="10" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <line y2="21" x2="1.4" y1="21" x1="41.2" stroke-miterlimit="10" stroke-linejoin="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <line y2="67" x2="1" y1="67" x1="41" stroke-miterlimit="10" stroke-linejoin="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <line y2="15" x2="25" y1="15" x1="19" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <circle r="2" cy="73" cx="21" fill="#2E3B4E"/>
  <line y2="11" x2="40" y1="11" x1="79" stroke-miterlimit="10" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <line y2="69" x2="41" y1="69" x1="79" stroke-miterlimit="10" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <line y2="74" x2="61" y1="74" x1="51" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
</svg>

</div>

<div class="copy"><h4 class="gap-none">Mobile Payments.</h4>

<p>Receive a FREE smartphone credit card reader, giving you the highest level of data security, real-time mobile payment processing and quick, hassle-free deposits. Great for small businesses getting started.</p>

<span class="arrow">Learn About Mobile Payments.</span>
</div>
</a>
</div>

<div class="item">
<a class="tile hotspot pad-small" data-link-action="Lead Form" data-link-label="Sales &amp; Support Section" href="#myModal"> 
<div class="icon"><svg height="68" width="68" viewBox="0 0 68 68" xmlns="http://www.w3.org/2000/svg" class="icon-68x68 icon-themed">
  <circle r="33" cy="34" cx="34" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <circle r="6" cy="17" cx="34" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <circle r="6" cy="51" cx="34" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <line y2="45" x2="34" y1="23" x1="34" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <circle r="6" cy="25.5" cx="19.3" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <circle r="6" cy="42.5" cx="48.7" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <line y2="39.5" x2="43.5" y1="28.5" x1="24.5" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <circle r="6" cy="42.5" cx="19.3" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <circle r="6" cy="25.5" cx="48.7" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
  <line y2="28.5" x2="43.5" y1="39.5" x1="24.5" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#2E3B4E" fill="none"/>
</svg></div>
<div class="copy"><h4 class="gap-none">Let EPS Show You The Way!</h4>
<p>Ready to learn more about which small business credit card processing solution is best for your business? Call 1-800-863-5995 for a no obligation FREE Statement Analysis and see how much you can save.</p>

<span class="arrow">Click Here </span>
</div>
</a>
</div>

</div>
</div>
</section>

<section class="section white m-b-40">
		<div class="content pad-vert-medium">
				<div class="p-b-30">
				<h3 class="text-center">Technology Partners</h3>
				<p class="text-center">EPS has partnered with some of the largest, most innovative companies in the industry to help you on your way.</p>
				</div>
					<div class="row feature-list col-md-12">
						<div class="col-md-3 ">	<div class="partners text-center hoverimg"><img src="{{ URL::to('media/partners/auth.png') }}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="200"></div></div>
						<div class="col-md-3 ">	<div class="partners text-center hoverimg"><img src="{{ URL::to('media/partners/cp.png') }}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="500"></div></div>
						<div class="col-md-3 ">	<div class="partners text-center hoverimg"><img src="{{ URL::to('media/partners/dv.png') }}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="800"></div></div>
						<div class="col-md-3 ">	<div class="partners text-center hoverimg"><img src="{{ URL::to('media/partners/vf.png') }}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="1000"></div></div>
				
				</div>
		</div>
</section>
<div id="boxes">
  <div style="top: 199.5px; left: 551.5px; display: none;" id="dialog" class="window"> 
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <span id="close" class="close" data-dismiss="modal" aria-hidden="true">×</span>
			  <br>
			  <i class="fa fa-credit-card fa-6x"></i>
			  
			</div>
			{!! Form::open(array('url' => 'statementAnalysis','id'=>'analysis','class'=>'form-no-horizontal-spacing')) !!}
			<div class="modal-body">
			<h1 id="myModalLabel" class="semi-bold large-text">It takes 2 min to get 2% or more of your company back</h1>
			<p class="m-b-10">Let EPS show you why you ar paying to much to process cards for you business and how we can fix it.</p>
			<p class="m-b-40">Call Us Today: <big>(800) 863-5995</big></p>
			<fieldset class="account_information">
				<div class="row form-row">
					<div class="col-md-6">
						<div class="input-with-icon  right">
						<i class=""></i>
						{!! Form::text('name', '' , ['class'=>'form-control', 'id'=>'name','placeholder'=>'Your Name']) !!}
						</div>
					</div>
					<div class="col-md-6">
					<div class="input-with-icon  right">
					<i class=""></i>
					{!! Form::text('business', '' , ['class'=>'form-control', 'id'=>'business','placeholder'=>'Business Name']) !!}
					</div>
				</div>
				</div>
				<div class="row form-row">
				<div class="col-md-12">
					<div class="input-with-icon  right">
					<i class=""></i>
					{!! Form::text('email', '' , ['class'=>'form-control', 'id'=>'email','placeholder'=>'Your Email']) !!}
					</div>
				</div>
				</div>
				</fieldset>

				<fieldset class="company_information">
				<div class="row form-row">
				<div class="col-md-6">
					<div class="input-with-icon  right">
					<i class=""></i>
					{!! Form::text('phone', '' , ['class'=>'form-control', 'id'=>'phone','placeholder'=>'Your Phone']) !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-with-icon  right"><i class=""></i>
					{!! Form::text('current_rate', '' , ['class'=>'form-control', 'id'=>'current_rate','placeholder'=>'Current Rate']) !!}
					</div>
				</div>
				</div>
				
				<div class="row form-row">
				<div class="col-md-6 selectC">
					<div class="input-with-icon  right"><i class=""></i>
					<select class="form-control select2" name="state" id="status"><option selected="selected" value="">Select state..</option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AS">American Samoa</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="GU">Guam</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MH">Marshall Islands</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="MP">Northern Marianas Islands</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PW">Palau</option><option value="PA">Pennsylvania</option><option value="PR">Puerto Rico</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VI">Virgin Islands</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select>

					</div>
				</div>
				<div class="col-md-6">
					<div class="input-with-icon  right"><i class=""></i>
					{!! Form::text('city', '' , ['class'=>'form-control', 'id'=>'city','placeholder'=>'City']) !!}
					</div>
				</div>
				</div>
				</fieldset>

				<fieldset class="personal_information">
				<div class="row form-row m-t-10">
				<div class="col-md-12">
				<label class="form-label">How did you hear about EPS</label>
				<div class="radio">
					<div class="row col-md-12 align-left">
					  <input type="radio" checked="checked" value="newspaper" name="hear_about" id="newspaper">
					  <label for="newspaper">Newspaper/Magazine Ad </label>
					  </div>
					  <div class="row col-md-12 align-left">
					  <input type="radio" value="web" name="about" id="web">
					  <label for="web">Web</label>
					  </div>
					  <div class="row col-md-12 align-left">
					  <input type="radio" value="radio" name="about" id="radio">
					  <label for="radio">Radio Ad</label>
					  </div>
					  <div class="row col-md-12 align-left">
					  <input type="radio" value="wom" name="about" id="wom">
					  <label for="wom">Word of Mouth</label>
					  </div>
					  <div class="row col-md-12 align-left">
					  <input type="radio" value="other" name="about" id="other">
					  <label for="other">Other</label>
					  </div>
					</div>

				</div>
				</div>

				<div class="row form-row m-t-10">
				<div class="col-md-12">
					<label class="form-label">If "Other, please add here (optional) </label>
					<div class="input-with-icon  right"><i class=""></i>
					{!! Form::text('hear_about_other', '' , ['class'=>'form-control', 'id'=>'others','placeholder'=>'']) !!}
					</div>
				</div>
				</div>

				<div class="row form-row m-t-10">
				<div class="col-md-12">
					<label class="form-label">To make sure you are human, what is 3 + 4?</label>
					<div class="input-with-icon  right"><i class=""></i>
					{!! Form::hidden('confirmcapcha', '7' , ['id'=>'confirmcapcha']) !!}
					{!! Form::text('capcha', '' , ['class'=>'form-control', 'id'=>'capcha','placeholder'=>'']) !!}
					</div>
				</div>
				</div>
				</fieldset>			
			
			</div>

			<div class="modal-footer">
			<fieldset class="account_information">
				  <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
				  <button class="btn-green next">Continue</button>
				  </fieldset>
			  <fieldset class="company_information">
				  <button type="button" class="btn btn-danger previous">Back</button>
				  <button class="btn-green next">Continue</button>
				  </fieldset>
			  <fieldset class="personal_information">
				  <button type="button" class="btn btn-danger align-left previous">Back</button>
				  <button class="btn-green" type="submit">Submit</button>
				</fieldset>
			  
			</div>
			{!! Form::close()!!}
			</div>
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
    
  </div>
  <div id="mask"></div>
</div>


@endsection


@section('moreJS')
<script>
$(document).ready(function() {	

		var id = '#dialog';
		setTimeout(function(){
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(500);	
		$('#mask').fadeTo("slow",0.9);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(1000); 	
	
	
	//if close button is clicked
	$('.window #close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
var errorDiv = $('#dialog:visible').first();
var scrollPos = errorDiv.offset().top;
$(window).scrollTop(scrollPos);	
},15000);	
});
</script>
@stop
