<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Client Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="/flatlab-theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/flatlab-theme/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/flatlab-theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
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

<style>
table tr td input, table tr td select{width:137px !important;}
</style>

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
                      </li>
                      <!-- notification dropdown end -->
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
                             <a href="javascript:;" class="active">
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
                                      <li ><a  href="{{URL::to('/client/apis/create')}}">Manage API Keys</a></li>
                                  </ul>
                          </li>
                          
                         <li class="sub-menu">
                                    <a href="javascript:;">
                                       <i class="fa fa-laptop"></i>
                                    <span id="yourfeeds">Your Feeds</span>
                                   </a>
                                <ul class="sub">
                             <!-- <li><a  href="{{URL::to('/client/sites')}}">View Sites</a></li> -->
                            <li class="active" ><a  href="{{URL::to('client/feeds')}}">View Feeds</a></li> 
                           <li><a  href="{{URL::to('client/feeds/create')}}">Add New Feeds</a></li>  
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
                           Feeds 
                         </header>
                         @if(Session::has('success'))
                         {{ Session::get('success') }}
                         @endif
                          <div class="panel-body">
                          <div class="adv-table">

         
 <table  style="max-width: 100%; overflow: auto" class="display table table-bordered table-striped" id="dynamic-table">
                 <thead>
                     <tr>
                      <th>Feed</th>
                      <th>URL</th>
                      <th>Check Interval</th>
                      <th>Validation Mode</th>
                      <th>Validation Keyword</th>
                      <th>Actions</th>
 

                     </tr>
                  </thead>
                 <tbody> 
                   @foreach($feeds as $feed)
                   <tr class="gradeX">
                      <td class="up" style="max-width: 100%; overflow: auto">
                      <input  style="max-width: 100%; overflow: auto"  class="form-control" type="text"name="FeedName" id="FeedName" value="{{$feed->FeedName}}"/> 
                      </td>
                      <td class="up" style="max-width: 100%; overflow: auto">
                      <input  style="max-width: 100%; overflow: auto"  class="form-control" type="text"name="FeedName" id="FeedName" value="{{$feed->URL}}"/> 
                      </td>
              

                        <td class="up" style="max-width: 100%; overflow: auto">
                      <select id="CheckFrequencyHours" style="max-width: 100%; overflow: auto"  class="form-control" name="CheckFrequencyHours"><option value="2" >2 hours</option>
                      <option value="3" >3 hours</option>
                      <option value="4" >4 hours</option>
                      <option value="6" >6 hours</option>
                      <option value="8" >8 hours</option>
                      <option value="12" >12 hours</option>
                      <option value="18" >18 hours</option>
                      <option value="24" >1 day</option>
                      <option value="48" >2 days</option>
                      <option value="72" >3 days</option></select>
                      

                      </td>
                      <td class="up" style="max-width: 100%; overflow: auto">
                       <select style="max-width: 100%; overflow: auto"  class="form-control" name="ValidationMode" id="ValidationMode"><option value="Skip">Skip  </option>
                      <option value="all">All  </option>
                      <option value="exacti">Exact Case-Insensitive  </option> 
                        <option value="exact">Exact Case-Sensitive  </option></select> 

                      </td>
                      <td class="up" style="max-width: 100%; overflow: auto">
                      <input style="max-width: 100%; overflow: auto"  class="form-control" type="text" name="ValidationKeyword" id="ValidationKeyword"value="{{$feed->ValidationKeyword}}"/> 
                      </td>
                      <td>            <button style="margin-top:3px" id="update" rel="{{$feed->FeedId}}"data-href="#" data- target="#" data-toggle="modal" class="btn btn-info" type="button">
                                     <i class="fa fa-trash"></i> Update
                                        </button><br>
                                        <a style="margin-top:3px"  href="http://45.55.194.251/client/feeds/{{$feed->FeedId}}/edit" class="btn btn-info">View Posts</a><br>

                                       <button style="margin-top:3px"  id="delete" rel="{{$feed->FeedId}}" data-href="#" class="btn btn-danger" type="button">
                                              <i class="fa fa-trash"></i> Delete
                                        </button>
                                        </td>

                    </tr>
                    @endforeach
                 </tbody>
           </table>


</div>
 </div>
   </section>
       </div>
      </div>
      </section>
     </section>
          <!--footer start-->
          <footer class="site-footer">
              <div class="text-center">
                  2015 &copy;
              </div>
          </footer>
          <!--footer end-->
      </section>
      </div>

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

<script>
$('document').ready(function(){
$( "#yourfeeds" ).trigger( "click" );
});

$('#update').click(function (event) {
  var $row = $(this).parents("tr").children(".up"); 
var FeedName             = $row.find("#FeedName").val();
var CheckFrequencyHours  = $row.find("#CheckFrequencyHours").val();
var ValidationMode       = $row.find("#ValidationMode").val();
var ValidationKeyword    = $row.find("#ValidationKeyword").val();
var id = $(this).attr('rel');

        $.ajax({
        type:"POST",
        url:"http://45.55.194.251/client/feeds/update",
        data:  {0:FeedName,1:CheckFrequencyHours,2:ValidationMode,3:ValidationKeyword,5:id},
        success:function (data) {
        location.reload();
        }

    });
    event.preventDefault();
});


$('#delete').click(function (event) {
  var id = $(this).attr('rel');

        $.ajax({
        type:"DELETE",
        url:"http://45.55.194.251/client/feeds/"+id,
        //data:  {0:FeedName,1:CheckFrequencyHours,2:ValidationMode,3:ValidationKeyword,5:id},
        success:function (data) {
        location.reload();
        }

    });
    event.preventDefault();
});




</script>