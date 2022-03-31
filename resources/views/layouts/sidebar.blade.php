<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="{{ asset('assets/') }}//images/dashboard/multikart-logo.png" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{ (!empty(Auth::user()->profile_photo_path)) ? URL::to(Auth::user()->profile_photo_path) : URL::to('assets/images/dashboard/designer.jpg') }}" alt="#" style="width: 60px; height: 60px; object-fit: cover;">
            </div>
            <h6 class="mt-3 f-14">{{ Auth::user()->name }}</h6>
            <p>{{ Auth::user()->email }}</p>
        </div>


        @php
            $prefix = Request::route()->getPrefix();
            $route = Route::current()->getName();
        @endphp

        <ul class="sidebar-menu">
            <li><a class="sidebar-header active" href="{{ route('dashboard') }}"><i data-feather="home"></i><span>Dashboard</span></a></li>

            @if(Auth::user()->users == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('users.list') }}"><i class="fa fa-circle"></i>User List</a></li>
                    <li><a href="{{ route('add.user') }}"><i class="fa fa-circle"></i>Create User</a></li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->entery_passport == 1)
            <li><a class="sidebar-header" href="{{ route('passport.list') }}"><i data-feather="clipboard"></i><span>Entry Passport</span></a></li>
            @endif

            <!-- Count Test Medical -->
            @php
                $tm_new = App\Models\TestMedical::where('medical_attend_date', null)->where('report_delivery_date', null)->where('medical_report_status', null)->where('status', 0)->count();
                $tm_pending = App\Models\TestMedical::where('medical_attend_date', '!=', null)->where('report_delivery_date', '!=', null)->where('medical_report_status', null)->where('status', 0)->count();
                $tm_done = App\Models\TestMedical::where('medical_attend_date', '!=', null)->where('report_delivery_date', '!=', null)->where('medical_report_status', '!=', null)->where('status', 0)->count();
            @endphp
            <!-- !Count Test Medical -->

            @if(Auth::user()->test_medical == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="tag"></i><span>Test Medical</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('tMedical.list') }}"><i class="fa fa-circle"></i>New Data List</a> ( <span class="text-danger">{{ $tm_new }}</span> )</li>
                    <li><a href="{{ route('tMedical.pending.list') }}"><i class="fa fa-circle"></i>Pending Data List</a> ( <span class="text-danger">{{ $tm_pending }}</span> )</li>
                    <li><a href="{{ route('tMedical.done.list') }}"><i class="fa fa-circle"></i>Done Data List</a> ( <span class="text-danger">{{ $tm_done }}</span> )</li>
                </ul>
            </li>
            @endif

            <!-- Count Final Medical -->
            @php
                $fm_new = App\Models\FinalMedical::where('medical_attend_date', null)->where('report_delivery_date', null)->where('medical_report_status', null)->where('status', 0)->count();
                $fm_pending = App\Models\FinalMedical::where('medical_attend_date', '!=', null)->where('report_delivery_date', '!=', null)->where('medical_report_status', null)->where('status', 0)->count();
                $fm_done = App\Models\FinalMedical::where('medical_attend_date', '!=', null)->where('report_delivery_date', '!=', null)->where('medical_report_status', '!=', null)->where('status', 0)->count();
            @endphp
            <!-- !Count Final Medical -->

            @if(Auth::user()->final_medical == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="align-left"></i><span>Final Medical</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('fMedical.list') }}"><i class="fa fa-circle"></i>New Data List</a> ( <span class="text-danger">{{ $fm_new }}</span> )</li>
                    <li><a href="{{ route('fMedical.pending.list') }}"><i class="fa fa-circle"></i>Pending Data List</a> ( <span class="text-danger">{{ $fm_pending }}</span> )</li>
                    <li><a href="{{ route('fMedical.done.list') }}"><i class="fa fa-circle"></i>Done Data List</a> ( <span class="text-danger">{{ $fm_done }}</span> )</li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->police_clearance == 1)
            <li><a class="sidebar-header" href="{{ route('pClearance.list') }}"><i data-feather="bar-chart"></i><span>Police Clearance</span></a></li>
            @endif

            @if(Auth::user()->mofa == 1)
            <li><a class="sidebar-header" href="{{ route('mofa.list') }}"><i data-feather="chrome"></i><span>Mofa</span></a></li>
            @endif

            @if(Auth::user()->visa == 1)
            <li><a class="sidebar-header" href="{{ route('visa.list') }}"><i data-feather="box"></i><span>Visa</span></a></li>
            @endif

            @if(Auth::user()->traning_certificate == 1)
            <li><a class="sidebar-header" href="{{ route('tran.list') }}"><i data-feather="shopping-bag"></i><span>Training Certificate</span></a></li>
            @endif

            @if(Auth::user()->man_power == 1)
            <li><a class="sidebar-header" href="{{ route('man.list') }}"><i data-feather="users"></i><span>Man Power</span></a></li>
            @endif

            @if(Auth::user()->flight == 1)
            <li><a class="sidebar-header" href="{{ route('flight.list') }}"><i data-feather="navigation"></i><span>Flight</span></a></li>
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
