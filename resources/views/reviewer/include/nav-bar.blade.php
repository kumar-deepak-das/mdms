<!-- /. NAV TOP  -->
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Reviewer Portal</a>
        <!-- <img src="{{ asset('public/assets/images/logo/kiit-logo-wide.png') }}" class="img-responsive1 img-thumbnail" /> -->
    </div>
    <div class="header-right">
        <!-- <a href="{{asset('admin')}}" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a> -->
        <a href="{{asset('reviewer/profile')}}" class="btn btn-primary" title="My Profile"><b></b><i class="fa fa-bars fa-2x"></i></a>
        <a href="{{asset('/reviewer/logout')}}" class="btn btn-danger" title="Logout"><i class="fa fa-sign-out fa-2x"></i></a>

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
                <a class="active-menu" href="{{asset('reviewer/dashboard')}}"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>

            <li>
                <a href="#" class="@if( Request::is('reviewer/paper-list') || Request::is('reviewer/paper-view')) active-menu-top @endif"><i class="fa fa-file"></i>Paper <span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level @if( Request::is('reviewer/paper-list') || Request::is('reviewer/paper-view')  || Request::is('reviewer/paper-add') ) collapse in @endif">
                    <li><a href="{{asset('reviewer/paper-list')}}" class="@if(Request::is('reviewer/paper-list')) active-menu-top @endif"><i class="fa fa-users"></i>Paper List</a></li>
                </ul>
            </li>

        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->