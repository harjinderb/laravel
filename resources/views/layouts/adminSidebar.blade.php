<!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper">
        <div class="profile-wrapper"> <img src="{{ URL :: to('dp/avatar.jpg') }}"  alt="" data-src="{{ URL :: to('dp/avatar.jpg') }}" data-src-retina="{{ URL :: to('dp/avatar2x.jpg') }}" width="69" height="69" /> </div>
        <div class="user-info">
          <div class="greeting">Welcome</div>
          <div class="username">{{ Auth::user()->FirstName }} <span class="semi-bold">{{ Auth::user()->LastName }}</span></div>
          <div class="status">Status<a href="#">
            <div class="status-icon green"></div>
            Online</a> / {!! HTML::link('/logout', 'Logout', array('id' => '')) !!}</div>
        </div>
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      
      <ul>
        <li class="start "> <a href="{{ URL :: to('dashboard') }}" > <i class="icon-custom-home"></i> <span class="title">Dashboard</span> <span class="selected"></span></a> </li>
            <li class=""> <a href="javascript:;"> <i class="fa fa-envelope"></i> <span class="title">Email</span> <span class=" badge badge-disable pull-right ">203</span></a> </li>
        <li class=""> <a href="{{ URL :: to('/') }}" target="_blank"> <i class="fa fa-flag"></i>  <span class="title">Frontend</span></a></li>
       <li class=""> <a href="javascript:;"> <i class="fa fa-users"></i> <span class="title">Users</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
              <li > <a href="{{ URL :: to('admin/users/add-new') }}"> <i class="fa fa-plus-circle"></i> Add New User</a> </li>
              <li > <a href="{{ URL :: to('admin/users/manage') }}"> <i class="fa fa-gears"></i> Manage Users</a> </li>
            </ul>
        </li>    
       <li class=""> <a href="javascript:;"> <i class="fa fa-list-ul"></i> <span class="title">Categories</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
              <li > <a href="{{ URL :: to('admin/category/add-new') }}"> <i class="fa fa-plus-circle"></i> Add New</a> </li>
              <li > <a href="{{ URL :: to('admin/category/manage') }}">  <i class="fa fa-gears"></i> Manage Category</a> </li>
            </ul>
        </li>    
        <li class=""> <a href="javascript:;"> <i class="fa fa-copy"></i> <span class="title">CMS Pages</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
              <li > <a href="{{ URL :: to('admin/cms-pages/add-new') }}"> <i class="fa fa-plus-circle"></i> Add New</a> </li>
              <li > <a href="{{ URL :: to('admin/cms-pages/manage') }}">  <i class="fa fa-gears"></i> Manage Pages</a> </li>
            </ul>
        </li> 
        
        <li class=""> <a href="javascript:;"> <i class="fa fa-list-alt"></i> <span class="title">Blog</span><span class="arrow "></span> </a>
            <ul class="sub-menu">
              <li > <a href="{{ URL :: to('admin/blog/add-new') }}"> <i class="fa fa-file-text-o"></i> Add New Post</a> </li>
              <li > <a href="{{ URL :: to('admin/blogs/manage') }}">  <i class="fa fa-copy"></i> Manage Posts</a> </li>
              <li > <a href="{{ URL :: to('admin/blog/managecat') }}">  <i class="fa fa-list-ul"></i> Post Categories</a> </li>
            </ul>
            </li>

             <li class=""> <a href="javascript:;"> <i class="fa fa-list-alt"></i> <span class="title">Statement Analysis  </span><span class="arrow "></span> </a>
            <ul class="sub-menu">
               <li > <a href="{{ URL :: to('admin/statement/manage') }}">  <i class="fa fa-copy"></i> Manage Statement Analysis</a> </li>
               </ul>
            </li>
        <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <div class="footer-widget">
    <div class="progress transparent progress-small no-radius no-margin">
      <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>
    </div>
    <div class="pull-right">
      <div class="details-status"> <span data-animation-duration="560" data-value="86" class="animate-number"></span>% </div>
      <a href="lockscreen.html"><i class="fa fa-power-off"></i></a></div>
  </div>
  <!-- END SIDEBAR -->
