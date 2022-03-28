<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="{{ asset('assets/') }}//images/dashboard/multikart-logo.png" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{ asset('assets/') }}//images/dashboard/man.png" alt="#">
            </div>
            <h6 class="mt-3 f-14">JOHN</h6>
            <p>general manager.</p>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="index.html"><i data-feather="home"></i><span>Dashboard</span></a></li>

            @if(Auth::user()->users == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('users.list') }}"><i class="fa fa-circle"></i>User List</a></li>
                    <li><a href="{{ route('add.user') }}"><i class="fa fa-circle"></i>Create User</a></li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->entery_passport == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="clipboard"></i><span>Entry Passport</span></a></li>
            @endif

            @if(Auth::user()->test_medical == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="tag"></i><span>Test Medical</span></a></li>
            @endif

            @if(Auth::user()->final_medical == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="align-left"></i><span>Final Medical</span></a></li>
            @endif

            @if(Auth::user()->police_clearance == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="bar-chart"></i><span>Police Clearance</span></a></li>
            @endif

            @if(Auth::user()->mofa == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="chrome"></i><span>Mofa</span></a></li>
            @endif

            @if(Auth::user()->visa == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="box"></i><span>Visa</span></a></li>
            @endif

            @if(Auth::user()->traning_certificate == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="shopping-bag"></i><span>Training Certificate</span></a></li>
            @endif

            @if(Auth::user()->man_power == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="users"></i><span>Man Power</span></a></li>
            @endif

            @if(Auth::user()->flight == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="navigation"></i><span>Flight</span></a></li>
            @endif

            @if(Auth::user()->accounts == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="plus"></i><span>Accounts</span></a></li>
            @endif

            @if(Auth::user()->agent == 1)
            <li><a class="sidebar-header" href="media.html"><i data-feather="user"></i><span>Agent</span></a></li>
            @endif

        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->
