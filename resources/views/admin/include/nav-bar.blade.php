<!-- /. NAV TOP  -->
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">{{env('APP_NAME')}} Admin Portal</a>
        <!-- <img src="{{ asset('public/assets/images/logo/kiit-logo-wide.png') }}" class="img-responsive1 img-thumbnail" /> -->
    </div>
    <div class="header-right">
        <!-- <a href="{{asset('admin')}}" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a> -->
        <a href="{{asset('admin/profile')}}" class="btn btn-primary" title="My Profile"><b></b><i class="fa fa-bars fa-2x"></i></a>
        <a href="{{asset('/admin/logout')}}" class="btn btn-danger" title="Logout"><i class="fa fa-sign-out fa-2x"></i></a>

    </div>
</nav>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <img src="{{ asset('public/assets/images/logo/kiit-logo-wide.png') }}" class="img-responsive img-thumbnail" />
                <!-- <div class="user-img-div">
                    <img src="{{ asset('public/assets/img/logo/kiit-logo.png') }}" class="img-responsive img-thumbnail1" />
                    <div class="inner-text">
                        Admin<br /> <small>Last Login : 2 Weeks Ago </small>
                    </div>
                </div> -->
            </li>
            <li>
                <a class="active-menu" href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>


            <li>
                <a href="#" class="@if( Request::is('admin/school-add') || Request::is('admin/school-list') || Request::is('admin/school-details') ) active-menu-top @endif"><i class="fa fa-bank"></i>Schools <span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level @if( Request::is('admin/school-add') || Request::is('admin/school-list') || Request::is('admin/school-details') ) collapse in @endif">
                    <li><a href="{{asset('admin/school-add')}}" class="@if(Request::is('admin/school-add')) active-menu-top @endif"><i class="fa fa-bank"></i>Add School</a></li>
                    <li><a href="{{asset('admin/school-list')}}" class="@if(Request::is('admin/school-list')) active-menu-top @endif"><i class="fa fa-bars"></i>School List</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="@if( Request::is('admin/reviewer-add') || Request::is('admin/reviewer-list') || Request::is('admin/reviewer-view') ) active-menu-top @endif"><i class="fa fa-users"></i>Reviewer <span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level @if( Request::is('admin/reviewer-list') || Request::is('admin/reviewer-view')  || Request::is('admin/reviewer-add') ) collapse in @endif">
                    <li><a href="{{asset('admin/reviewer-add')}}" class="@if(Request::is('admin/reviewer-add')) active-menu-top @endif"><i class="fa fa-user"></i>Add a Reviewer</a></li>
                    <li><a href="{{asset('admin/reviewer-list')}}" class="@if(Request::is('admin/reviewer-list')) active-menu-top @endif"><i class="fa fa-users"></i>Reviewer List</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="@if( Request::is('admin/paper-add') || Request::is('admin/paper-list') || Request::is('admin/paper-view')) active-menu-top @endif"><i class="fa fa-file"></i>Paper <span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level @if( Request::is('admin/paper-list') || Request::is('admin/paper-view')  || Request::is('admin/paper-add') ) collapse in @endif">
                    <li><a href="{{asset('admin/paper-add')}}" class="@if(Request::is('admin/paper-add')) active-menu-top @endif"><i class="fa fa-plus"></i>Add a Paper</a></li>
                    <li><a href="{{asset('admin/paper-list')}}" class="@if(Request::is('admin/paper-list')) active-menu-top @endif"><i class="fa fa-users"></i>Paper List</a></li>
                </ul>
            </li>

        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->