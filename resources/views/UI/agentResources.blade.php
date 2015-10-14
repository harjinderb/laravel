@extends('layouts.userprofile')

@section('metainfo')
<title>Agent Resources | EPS</title>
<meta content="EPS is one service for your entire business, from secure credit card processing - including Apple Pay &amp; EMV - to point of sale solutions. Sign up today!" name="description" />
<meta content="credit card processing, business solutions, accept credit card payments, accept nfc, apple pay, contactless, Square" name="keywords" />
@stop
@section('extrastyle')

<style>
@media (min-width: 1292px) {
.home-page .hero .image, .home-page .banner .image {
    background-image: url("{!! URL::to('assets/img/resources.jpg')!!}");
    height: 500px;
    background-size: 100% 100%;
}
.hero-image-split .hero {
   /* height: 425px !important;*/
}
}
</style>
@stop

@section('content')
<section class="headersection">
	<div class="innersection"> 
		<div class="content">
				<div class="headline">
				<h1 class="inline-block gap-top-col gap-top-none-at-medium ">Agent Resources</h1>
				<span class="bullet"></span>
				</div>
		</div>
	</div>
</section>

<section>
<div class="container p-t-70 p-b-50">
	<div class="row grid">
		<div class="col-md-12 content p-b-50">	
        <div class="col-md-6">
          <div class="grid simple transparent">
         		<a target="_blank" href="pdfs/trainingBulletin.pdf" class="gridimg">	  
                {!! HTML::image('images/TrainingBulliten.jpg') !!}
				</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="grid solid green">
            <div class="grid-title">
              <h4>New Agent Documents</h4>
             </div>
            <div class="grid-body">
			<ul>
			<li><a target="_blank" href="pdfs/agentApp.pdf">Agent Application</a></li>
			<li><a target="_blank" href="pdfs/agentGuidelines.pdf">Agent Guidelines</a></li>
			<li><a target="_blank" href="pdfs/agentMarketingAgreement.pdf">Agent Marketing Agreement</a></li>
			<li><a target="_blank" href="pdfs/agentBuyRates.pdf">Agent Buy Rates</a></li>
			<li><a target="_blank" href="pdfs/agentWelcomeKit.pdf">Welcome Kit</a></li>
			</ul>
            </div>
          </div>
        </div>
     	</div>
		
		<div class="col-md-12 content p-b-50">	
			<div class="col-md-6 ">
			  <div class="grid simple horizontal green">
				<div class="grid-title border">
				  <h4>Training<span class="semi-bold"> Videos</span></h4>
					  <div class="color-bands green"></div>
					  <div class="color-bands red"></div>
					  <div class="color-bands blue"></div>
					  <div class="color-bands purple"></div>
				  
				</div>
				<div class="grid-body border">
				  <div class="row-fluid">
					<ul>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=brjtpSM2LeY">EPS 90 Pitch</a></li>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=-XOxLJwHR6E">Credibility</a></li>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=s6k7rT7j958">The EPS 90 Product</a></li>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=XFmYy5EULJg">Sales Presentation</a></li>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=Fuiq3WMOARU">Closing</a></li>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=PcVcmC1KvdI">Objections And Rebuttals</a></li>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=nYX7eqJPMPE">Paper Work</a></li>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=beiUyJFNW50">How To Run A EPS 90 And Single Check Transaction</a></li>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=or92flBG4ks">How To Setup A ELITE II And RDM 6014</a></li>
					<li><a target="_blank" href="https://www.youtube.com/watch?v=zZDvKVE7I3o">Frequently Asked Questions </a></li>
					</ul>
				
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-md-6">
			  <div class="grid simple horizontal red">
				<div class="grid-title ">
					<h4>New<span class="semi-bold"> Material</span></h4>
					<div class="color-bands purple"></div>
					<div class="color-bands red"></div>
					<div class="color-bands green"></div>
					<div class="color-bands blue"></div>
				 </div>
				<div class="grid-body">
				<ul>
				<li><a target="_blank" href="pdfs/ezPayMobile.pdf">EZ Pay Mobile</a></li>
				<li><a target="_blank" href="pdfs/mobileTerminalOrderForm.pdf">Mobile Terminal Order From</a></li>
				<li><a target="_blank" href="pdfs/powerPointFull.pdf">Full PDF PowerPoint</a></li>
				<li><a target="_blank" href="pdfs/powerPointMerchants.pdf">PDF PowerPoint To Show Merchants</a></li>
				<li><a target="_blank" href="pdfs/powerPointJpeg.zip">Download Powerpoint in Jpeg Format</a></li>
				<li><a target="_blank" href="pdfs/tierStatement.pdf">Tier Statement</a></li>
				<li><a target="_blank" href="pdfs/interchangePlusStatement.pdf">Interchange Plus Statement</a></li>
				<li><a target="_blank" href="pdfs/rates.pdf">Rates</a></li>
				<li><a target="_blank" href="pdfs/telPitches.pdf">Telemarketing Pitches</a></li>
				<li><a target="_blank" href="pdfs/leadsChamberCommerce.pdf">Leads Through Chambers Of Commerce</a></li>
				<li><a target="_blank" href="pdfs/leadsBusinessAssociations.pdf">Leads Through Business Associations</a></li>
				</ul>
				</div>
			  </div>
			</div>

		</div>
		
		<div class="col-md-12 content p-b-50">	
			<div class="col-md-6">
			  <div class="grid simple horizontal blue">
				<div class="grid-title border">
				  <h4>Documents</h4>
					  <div class="color-bands red"></div>
					  <div class="color-bands green"></div>
					  <div class="color-bands purple"></div>
					  <div class="color-bands blue"></div>
				  
				</div>
				<div class="grid-body border">
				  <div class="row-fluid">
					<ul>
					<li><a target="_blank" href="pdfs/merchantApplication.pdf">Merchant Application</a></li>
					<li><a target="_blank" href="pdfs/processingAgreementArticles.pdf">Merchant Application Articles</a></li>
					<li><a target="_blank" href="pdfs/pinBasedDebit.pdf">Pin Based Debit Form</a></li>
					<li><a target="_blank" href="pdfs/terminalOrder.pdf">Terminal Order Form</a></li>
					<li><a target="_blank" href="pdfs/merchantApplicationSample.pdf">Sample Application</a></li>

					<li><a target="_blank" href="pdfs/amexAPP.pdf">Amex Application</a></li>
					<li><a target="_blank" href="pdfs/prohibitedBusinessTypes.pdf">EPS Prohibited Business Types</a></li>
					<li><a target="_blank" href="pdfs/pricingSchA-Glossary.pdf">Pricing Schedule A &amp; Glossary</a></li>
					<li><a target="_blank" href="pdfs/pitchBook.pdf">Pitch Book</a></li>
					<li><a target="_blank" href="pdfs/cancellationLetter.pdf">Cancellation Letter</a></li>
					<li><a target="_blank" href="pdfs/rapidAdvanceApp.pdf">Rapid Advance Application</a></li>
					<li><a target="_blank" href="pdfs/rapidProhibited.pdf">Rapid Advance Prohibited Business Types</a></li>
					<li><a target="_blank" href="pdfs/tenderCardApp.pdf">Tender Card Application</a></li>
					<li><a target="_blank" href="pdfs/businessCard.pdf">Agent Business Card Template</a></li>
					<li><a target="_blank" href="http://orders.texasbusinesscardfactory.com/Login.aspx?ID=l5hbQ4DCC0A%3d">Order Your EPS Agent Business Cards Here</a></li>
					<li><a target="_blank" href="pdfs/nameTag.pdf">Agent Name Tag</a></li>
					<li><a target="_blank" href="pdfs/eps90Welcome.pdf">EPS 90 Welcome Letter</a></li>
					<li><a target="_blank" href="pdfs/eps90Installation.pdf">EPS 90 Installation</a></li>
					<li><a target="_blank" href="pdfs/eps90Instructions.pdf">EPS 90 Instructions</a></li>
					<li><a target="_blank" href="pdfs/eps90FAQ.pdf">EPS 90 FAQ</a></li>
					<li><a target="_blank" href="pdfs/eps90CustomerAgreement.pdf">EPS 90 Customer Agreement</a></li>
					<li><a target="_blank" href="pdfs/eps90CustomerAgreementSample.pdf">EPS 90 Customer Agreement Sample</a></li>
					<li><a target="_blank" href="pdfs/eps90CustomerAgreementSpanish.pdf">EPS 90 Customer Agreement (Spanish)</a></li>
					<li><a target="_blank" href="pdfs/eps90OnlineIntructions.pdf">EPS 90 Online Instructions</a></li>
					<li><a target="_blank" href="pdfs/merchantCCAF.pdf">Merchant Credit Card Authorization Form</a></li>
					</ul>
				
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-md-6">
			  <div class="grid simple horizontal purple">
				<div class="grid-title ">
					<h4>Brochures</h4>
					<div class="color-bands green"></div>
					<div class="color-bands red"></div>
					<div class="color-bands purple"></div>
					<div class="color-bands blue"></div>
				 </div>
				<div class="grid-body">
				<ul>
				<li><a target="_blank" href="pdfs/leaveBehind.pdf">Document To Leave Behind With Merchants</a></li>
				<li><a target="_blank" href="pdfs/bannerHQ.pdf">Example of an EPS 90 Banner</a></li>
				<li><a target="_blank" href="pdfs/merchantServicesTri.pdf">Merchant Services Tri-Fold</a></li>
				<li><a target="_blank" href="pdfs/eps90Tri.pdf">EPS 90 Tri-Fold</a></li>
				<li><a target="_blank" href="pdfs/eps90TriAppliance.pdf">EPS 90 Appliance Tri-Fold Example</a></li>
				<li><a target="_blank" href="pdfs/eps90TriRetail.pdf">EPS 90 Retail Tri-Fold Example</a></li>
				<li><a target="_blank" href="pdfs/eps90TriAuto.pdf">EPS 90 Auto Repair Tri-Fold Example</a></li>
				<li><a target="_blank" href="pdfs/eps90TriMedical.pdf">EPS 90 Medical Center Tri-Fold Example</a></li>
				<li><a target="_blank" href="pdfs/eps90TriDentist.pdf">EPS 90 Dental Services Tri-Fold Example</a></li>
				<li><a target="_blank" href="pdfs/eps90TriTattoo.pdf">EPS 90 Tattoo Tri-Fold Example</a></li>
				<li><a target="_blank" href="pdfs/eps90TriAttorney.pdf">EPS 90 Attorney Tri-Fold Example</a></li>
				<li><a target="_blank" href="pdfs/eps90TriVet.pdf">EPS 90 Veterinarian Tri-Fold Example</a></li>
				<li><a target="_blank" href="pdfs/eps90TriContractor.pdf">EPS 90 Contractor Tri-Fold Example</a></li>
				<li><a target="_blank" href="pdfs/paysaber.pdf">Paysaber Tri-Fold</a></li>
				<li><a target="_blank" href="pdfs/wirelessEPay.pdf">Wireless EPay</a></li>
				<li><a target="_blank" href="pdfs/rapidAdvanceTri.pdf">Rapid Advance Tri-Fold</a></li>
				<li><a target="_blank" href="pdfs/tenderCardCat.pdf">Tender Card Catalog</a></li>
				</ul>
				</div>
			  </div>
			</div>

		</div>
   
    </div>
</div>
 </section>
@endsection


@section('moreJS')
@stop
