
<!-- BEGIN CORE JS FRAMEWORK-->
    
<!--[if lt IE 9]>
{!! HTML::script('assets/plugins/respond.js') !!}
<![endif]-->
{!! HTML::script('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') !!}
{!! HTML::script('assets/plugins/boostrapv3/js/bootstrap.min.js') !!}

{!! HTML::script('assets/plugins/breakpoints.js') !!}
{!! HTML::script('assets/plugins/jquery-unveil/jquery.unveil.min.js') !!}
{!! HTML::script('assets/plugins/jquery-block-ui/jqueryblockui.js') !!}
{!! HTML::script('assets/plugins/jquery-lazyload/jquery.lazyload.min.js') !!}
{!! HTML::script('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') !!}
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
{!! HTML::script('assets/plugins/jquery-slider/jquery.sidr.min.js') !!}
{!! HTML::script('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! HTML::script('assets/plugins/pace/pace.min.js') !!}
{!! HTML::script('assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js') !!}
{!! HTML::script('assets/plugins/jquery-ricksaw-chart/js/raphael-min.js') !!}
{!! HTML::script('assets/plugins/jquery-ricksaw-chart/js/d3.v2.js') !!}
{!! HTML::script('assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js') !!}
{!! HTML::script('assets/plugins/jquery-sparkline/jquery-sparkline.js') !!}
{!! HTML::script('assets/plugins/skycons/skycons.js') !!}
{!! HTML::script('assets/plugins/owl-carousel/owl.carousel.min.js') !!}
{!! HTML::script('assets/plugins/owl-carousel/owl.carousel.min.js') !!}

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

{!! HTML::script('assets/plugins/jquery-gmap/gmaps.js') !!}
{!! HTML::script('assets/plugins/Mapplic/js/jquery.easing.js') !!}
{!! HTML::script('assets/plugins/Mapplic/js/jquery.mousewheel.js') !!}
{!! HTML::script('assets/plugins/Mapplic/js/hammer.js') !!}
{!! HTML::script('assets/plugins/Mapplic/mapplic/mapplic.js') !!}

{!! HTML::script('assets/plugins/jquery-flot/jquery.flot.js') !!}   
{!! HTML::script('assets/plugins/jquery-flot/jquery.flot.resize.min.js') !!}   
{!! HTML::script('assets/plugins/jquery-metrojs/MetroJs.min.js') !!}   
{!! HTML::script('assets/plugins/jquery-validation/js/jquery.validate.min.js') !!}   
{!! HTML::script('assets/js/dashboard_v2.js') !!}   
{!! HTML::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}   
{!! HTML::script('assets/plugins/bootstrap-select2/select2.min.js') !!}   
{!! HTML::script('assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js') !!}   

{!! HTML::script('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') !!}
{!! HTML::script('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') !!}
{!! HTML::script('assets/plugins/jquery-inputmask/jquery.inputmask.min.js') !!}
{!! HTML::script('assets/plugins/jquery-autonumeric/autoNumeric.js') !!}
{!! HTML::script('assets/plugins/ios-switch/ios7-switch.js') !!}
{!! HTML::script('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') !!}
{!! HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') !!}
{!! HTML::script('assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') !!}
{!! HTML::script('assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js') !!}
{!! HTML::script('assets/plugins/dropzone/dropzone.min.js') !!}
{!! HTML::script('assets/plugins/jquery-datatable/js/jquery.dataTables.min.js') !!}
{!! HTML::script('assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js') !!}
{!! HTML::script('assets/plugins/datatables-responsive/js/datatables.responsive.js') !!}
{!! HTML::script('assets/plugins/datatables-responsive/js/lodash.min.js') !!}
{!! HTML::script('assets/plugins/ladda/ladda.min.js') !!}
{!! HTML::script('assets/plugins/magnific-popup/magnific-popup.js') !!}
{!! HTML::script('assets/plugins/ckeditor/ckeditor.js') !!}

<!-- END PAGE LEVEL PLUGINS -->
{!! HTML::script('assets/js/form_elements.js') !!}
{!! HTML::script('assets/js/datatables.js') !!}
{!! HTML::script('assets/js/messages_notifications.js') !!}
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN CORE TEMPLATE JS -->
{!! HTML::script('assets/js/core.js') !!}
{!! HTML::script('assets/js/chat.js') !!}
{!! HTML::script('assets/js/demo.js') !!}
{!! HTML::script('assets/js/modals.js') !!}


@yield('moreJS')

<script type="text/javascript">
        $(document).ready(function () {
            $(".live-tile,.flip-list").liveTile();
            
			CKEDITOR.replace( 'editor1',
			{
			on : { instanceReady : function ( evt )  {
			$('#cke_editor1').addClass('fusionSkin');
			}}
			});
            // Init Ladda Plugin on buttons
	Ladda.bind( '.ladda-button', { timeout: 2000 } );

	// Bind progress buttons and simulate loading progress. Note: Button still requires ".ladda-button" class.
	Ladda.bind( '.progress-button', {
		callback: function( instance ) {
			var progress = 0;
			var interval = setInterval( function() {
				progress = Math.min( progress + Math.random() * 0.1, 1 );
				instance.setProgress( progress );

				if( progress === 1 ) {
					instance.stop();
					clearInterval( interval );
				}
			}, 200 );
		}
	});
         
			$('.reload').on('click', function () {
			var el = jQuery(this).parents(".grid");
			blockUI(el);
			window.setTimeout(function () {
			unblockUI(el);
			}, 1000);
			});    
        });
</script>
</body>
</html>

