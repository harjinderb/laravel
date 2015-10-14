<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Client Add New Feed Page</title>

    <!-- Bootstrap core CSS -->
    <link href="/flatlab-theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/flatlab-theme/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/flatlab-theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/vendor/css/jqx.base.css" type="text/css" />

      <!--right slidebar-->
      <link href="/flatlab-theme/css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/flatlab-theme/css/style.css" rel="stylesheet">
    <link href="/flatlab-theme/css/style-responsive.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="/flatlab-themeassets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="/flatlab-themeassets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="/flatlab-themeassets/data-tables/DT_bootstrap.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="/flatlab-theme/js/html5shiv.js"></script>
      <script src="/flatlab-theme/js/respond.min.js"></script>
    <![endif]-->
  </head>
<body class="boxed-page">
      <div class="container">

        <section id="container" class="">
          <!--header start-->
          <header class="header white-bg">
              <div class="container ">
                  <div class="sidebar-toggle-box">
                      <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-reorder tooltips"></div>
                  </div>
                  <!--logo start-->
                  <a href="#" class="logo" >Congen3</a>
                  <!--logo end-->
                  <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                    <ul class="nav top-menu">
                    </ul>
                  </div>
                  <div class="top-nav ">
                      <ul class="nav pull-right top-menu">
                          <li>
                              <input type="text" class="form-control search" placeholder="Search">
                          </li>
                          <!-- user login dropdown start-->
                          <li class="dropdown">
                              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                  <span class="username">Welcome, {{Session::get('name')}}</span>
                                  <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu extended logout">
                                  <div class="log-arrow-up"></div>
                                  <li><a href="{{URL::to('logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                              </ul>
                          </li>
                          <!-- user login dropdown end -->
                      </ul>
                  </div>
              </div>
          </header>
          <!--header end-->
          <!--sidebar start-->
          <aside>
              <div id="sidebar"  class="nav-collapse ">
                  <!-- sidebar menu start-->
                     <ul class="sidebar-menu" id="nav-accordion">
                          <li class="sub-menu">
                              <a href="javascript:;">
                                 <i class="fa fa-laptop"></i>
                               <span>Your Jobs</span>
                              </a>
                           <ul class="sub">
                            <li><a  href="{{URL::to('/client/jobs')}}">View Jobs</a></li>
                             <li><a  href="{{URL::to('/client/jobs/create')}}">Add New Job</a></li>
                            </ul>
                           </li>
                          <li class="sub-menu">
                            <a href="javascript:;">
                              <i class="fa fa-laptop"></i>
                                <span>Your Sites</span>
                            </a>
                             <ul class="sub">
                           <!-- <li><a  href="{{URL::to('/client/sites')}}">View Sites</a></li> -->
                         <li><a  href="{{URL::to('/client/sites/create')}}">Manage Sites</a></li>
                       </ul>
                      </li>
                      <li class="sub-menu">
                                        <a href="javascript:;">
                                         <i class="fa fa-laptop"></i>
                                       <span>API</span>
                                     </a>
                                  <ul class="sub">
                                     <!-- <li><a  href="{{URL::to('/client/sites')}}">View Sites</a></li> -->
                                      <li class="active"><a  href="{{URL::to('/client/apis/create')}}">Manage API Keys</a></li>
                                  </ul>
                          </li>
                        
                          <li class="sub-menu">
                                    <a href="javascript:;" class="active">
                                       <i class="fa fa-laptop"></i>
                                    <span id="yourfeeds">Your Feeds</span>
                                   </a>
                                <ul class="sub">
                             <!-- <li><a  href="{{URL::to('/client/sites')}}">View Sites</a></li> -->
                            <li><a  href="{{URL::to('client/feeds')}}">View Feeds</a></li> 
                            <li class="active"><a  href="{{URL::to('client/feeds/create')}}">Add New Feeds</a></li> 
                    </ul>
                         </li>

                          <li class="sub-menu">
                                    <a href="javascript:;" >
                                       <i class="fa fa-laptop"></i>
                                    <span id="ads">Advertising Management</span>
                                   </a>
                                <ul class="sub">
                             <!-- <li><a  href="{{URL::to('/client/sites')}}">View Sites</a></li> -->
                            <li ><a  href="{{URL::to('client/ads')}}">All Ads</a></li> 
                           <li><a  href="{{URL::to('client/ads/create')}}">Add New Ads</a></li>  
                    </ul>
                         </li>
                    </ul>
                   <!-- sidebar menu end-->
              </div>
          </aside>
          <!--sidebar end-->
          <!--main content start-->
          <section id="main-content">
                        <section class=" wrapper">
                           <!-- page start-->
                              <div class="row">
                             <div class="col-sm-12">
                         <section class="panel">
                           <header class="panel-heading">
                                Add new Feed
                           </header>
                        <div class="panel-body" style="padding: 3%;">
{{--
  <div style="width: 60%; margin-left: 20%; margin-top: 3%">
--}} {{--'id'=>'addNewJobForm', --}}
     {{Form::open(array('id'=>'addFeedForm', 'class' => 'addForm'))}}

     <div class="form-group">
                 {{Form::label('Feed', 'Feed:', array('class'=>'control-label'))}}
                 {{Form::text('FeedId', null, array('class'=>'form-control', 'placeholder'=>'Enter Feed', 'required'))}}
                 <div id ="FeedId_error"></div>
            </div>
            <div class="form-group">
                 {{Form::label('URL', 'URL:', array('class'=>'control-label'))}}
                 {{Form::text('URL', null, array('class'=>'form-control', 'placeholder'=>'Enter URL', 'required'))}}
                 <div id ="FeedId_error"></div>
            </div>

        <div class="form-group">
                 {{Form::label('keyword', 'Keyword:', array('class'=>'control-label'))}}
                 {{Form::text('keyword', null, array('class'=>'form-control', 'placeholder'=>'Enter Keyword', 'required'))}}
     {{Form::hidden('userid', Session::get('userid') , array('class'=>'form-control'))}}
                 <div id ="keyword_error"></div>
            </div>
            <div class="form-group">
              {{Form::label('mode', 'Mode', array('class'=>'control-label'))}}
              {{Form::select('mode', array('all' => 'All', 'exacti' => 'Exact Case-Insensitive', 'exact' => 'Exact Case-Sensitive', 'skip' => 'Skip'), null, array('class'=> 'form-control m-bot15'))}}
             <div id ="mode_error"></div>
            
                     </div>
                     <div class="form-group">
              {{Form::label('CheckFrequencyHours', 'Check Interval', array('class'=>'control-label'))}}
              <select name="heckFrequencyHours" class="form-control m-bot15" >
                      <option value="2" >2 hours</option>
                      <option value="3" >3 hours</option>
                      <option value="4" >4 hours</option>
                      <option value="6" >6 hours</option>
                      <option value="8" >8 hours</option>
                      <option value="12" >12 hours</option>
                      <option value="18" >18 hours</option>
                      <option value="24" >1 day</option>
                      <option value="48" >2 days</option>
                      <option value="72" >3 days</option>
              </select>
              
             <div id ="mode_error"></div>
            
                     </div>

            <div class="form-group">
            <div id ="subDomain_error"></div>
            <br>
             <div class="form-group">
                 <div class="col-md-offset-5 col-lg-10">
                 {{Form::submit('Add', array('class'=>'btn btn-danger'))}}
                 </div>
             </div>
         {{Form::close()}}
         <div id="successMessage"></div>
  </div>
  </section>
  </div>
  </div>
  </section>
  </section>
  </section>
  </div>

   <!--footer start-->
              <footer class="site-footer">
                  <div class="text-center">
                      2015 &copy;
                      <a href="#" class="go-top">
                          <i class="fa fa-angle-up"></i>
                      </a>
                  </div>
              </footer>
              <!--footer end-->

</body>

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="/flatlab-theme/js/jquery.js"></script>
    <script src="/flatlab-theme/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/flatlab-theme/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/flatlab-theme/js/jquery.scrollTo.min.js"></script>
    <script src="/flatlab-theme/js/slidebars.min.js"></script>
    <script src="/flatlab-theme/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/flatlab-theme/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="/flatlab-theme/js/common-scripts.js"></script>

    <script src="/flatlab-theme/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/flatlab-theme/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="/flatlab-theme/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/flatlab-theme/assets/data-tables/DT_bootstrap.js"></script>

    <!--dynamic table initialization -->
    <script src="/flatlab-theme/js/dynamic_table_init.js"></script>

<script type="text/javascript" src="/assets/vendor/js/demos.js"></script>
        <script type="text/javascript" src="/assets/vendor/js/jqxcore.js"></script>
        <script type="text/javascript" src="/assets/vendor/js/jqxdropdownbutton.js"></script>
        <script type="text/javascript" src="/assets/vendor/js/jqxbuttons.js"></script>
        <script type="text/javascript" src="/assets/vendor/js/jqxtree.js"></script>
        <script type="text/javascript" src="/assets/vendor/js/jqxpanel.js"></script>
        <script type="text/javascript" src="/assets/vendor/js/jqxscrollbar.js"></script>
        <script type="text/javascript" src="/assets/vendor/js/jqxdata.js"></script>

<script>

 $(document).ready(function () {
                        $("#dropDownButton").jqxDropDownButton({ width: 200, height: 25 });
                        $('#jqxTree').on('select', function (event) {
                            var args = event.args;
                            var item = $('#jqxTree').jqxTree('getItem', args.element);

                            $('input[name=verticalid]').val(item.id);
                            console.log(item.id);
                            var dropDownContent = '<div style="position: relative; margin-left: 3px; margin-top: 5px;">' + item.label + '</div>';
                            $("#dropDownButton").jqxDropDownButton('setContent', dropDownContent);
                        });

                         var data = <?php echo $verticals ?>

                        // prepare the data
                        var source =
                        {
                            datatype: "json",
                            datafields: [
                                { name: 'id' },
                                { name: 'parentid' },
                                { name: 'text' }

                            ],
                            id: 'id',
                            localdata: data
                        };

                        // create data adapter.
                        var dataAdapter = new $.jqx.dataAdapter(source);
                        // perform Data Binding.
                        dataAdapter.dataBind();
                        // get the tree items. The first parameter is the item's id. The second parameter is the parent item's id. The 'items' parameter represents
                        // the sub items collection name. Each jqxTree item has a 'label' property, but in the JSON data, we have a 'text' field. The last parameter
                        // specifies the mapping between the 'text' and 'label' fields.
                        var records = dataAdapter.getRecordsHierarchy('id', 'parentid', 'items', [{ name: 'text', map: 'label'}]);
                        $('#jqxTree').jqxTree({ source: records, width: '300px' });
                    });

$(document).ready(function() {

  // process the form
    $('#addFeedForm').submit(function(event) {
   
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/tools/AddFeedRequest.php',
            data        : $('#addFeedForm').serialize(),//formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data);

                if(data == "OK") {
      
           window.location = "/client/jobs";
                    
                } else if(data == "null") {
                   alert("Please choose at least 1 search engine");
                }

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
      
 });
   
//});

$('#mode').change(function(){
var mode = $( "#mode option:selected" ).text();
  if(mode=='Skip'){
    $('#keyword').val('');
    $('#keyword').attr('disabled','disabled');
  console.log('disable');
  }else{
   $('#keyword').removeAttr('disabled');
  }
});

$('document').ready(function(){
$( "#yourfeeds" ).trigger( "click" );
});


</script>
</html>



