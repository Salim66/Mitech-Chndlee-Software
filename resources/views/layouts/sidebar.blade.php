<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="blur-up lazyloaded" src="{{ asset('assets/') }}//images/dashboard/LOGO-ALL.png" alt=""></a></div>
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
            <li class="{{ ($prefix == '/dashboard') ? 'active' : '' }}"><a class="sidebar-header {{ ($route == 'dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i data-feather="home"></i><span>Dashboard</span></a></li>

            @if(Auth::user()->users == 1)
            <li class="active"><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li class="active"><a href="{{ route('users.list') }}"><i class="fa fa-circle"></i>User List</a></li>
                    <li><a href="{{ route('add.user') }}"><i class="fa fa-circle"></i>Create User</a></li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->entery_passport == 1)
            <li><a class="sidebar-header" href="{{ route('passport.list') }}"><i data-feather="clipboard"></i><span>Entry Passport</span></a></li>
            @endif

            <!-- Count Test Medical -->
            @php
                $tm_new = App\Models\TestMedical::where('medical_attend_date', null)->where('report_delivery_date', null)->where('medical_report_status', null)->where('user_id', Auth::user()->id)->where('status', 0)->count();
                $tm_pending = App\Models\TestMedical::where('medical_report_status', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $tm_done = App\Models\TestMedical::where('medical_attend_date', '!=', null)->where('report_delivery_date', '!=', null)->where('medical_report_status', '!=', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
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
                $fm_new = App\Models\FinalMedical::where('medical_attend_date', null)->where('report_delivery_date', null)->where('medical_report_status', null)->where('user_id', Auth::user()->id)->where('status', 0)->count();
                $fm_pending = App\Models\FinalMedical::where('medical_report_status', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $fm_done = App\Models\FinalMedical::where('medical_attend_date', '!=', null)->where('report_delivery_date', '!=', null)->where('medical_report_status', '!=', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
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

            <!-- Count Police Clearance -->
            @php
                $pc_new = App\Models\PoliceClearance::where('police_clearance_date', null)->where('police_clearance_report', null)->where('user_id', Auth::user()->id)->where('status', 0)->count();
                $pc_pending = App\Models\PoliceClearance::where('police_clearance_date', '!=', null)->where('police_clearance_report', null)->where('user_id', Auth::user()->id)->where('status', 0)->count();
                $pc_done = App\Models\PoliceClearance::where('police_clearance_date', '!=', null)->where('police_clearance_report', '!=', null)->where('user_id', Auth::user()->id)->where('status', 0)->count();
            @endphp
            <!-- !Count Police Clearance -->

            @if(Auth::user()->police_clearance == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="bar-chart"></i><span>Police Clearance</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('pClearance.list') }}"><i class="fa fa-circle"></i>New Data List</a> ( <span class="text-danger">{{ $pc_new }}</span> )</li>
                    <li><a href="{{ route('pClearance.pending.list') }}"><i class="fa fa-circle"></i>Pending Data List</a> ( <span class="text-danger">{{ $pc_pending }}</span> )</li>
                    <li><a href="{{ route('pClearance.done.list') }}"><i class="fa fa-circle"></i>Done Data List</a> ( <span class="text-danger">{{ $pc_done }}</span> )</li>
                </ul>
            </li>
            @endif

            <!-- Count Mofa -->
            @php
                $mofa_new = App\Models\Mofa::where('mofa_date', null)->where('mofa_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $mofa_pending = App\Models\Mofa::where('mofa_date', '!=', null)->where('mofa_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $mofa_done = App\Models\Mofa::where('mofa_date', '!=', null)->where('mofa_report', '!=', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
            @endphp
            <!-- !Count Mofa -->

            @if(Auth::user()->mofa == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>Mofa</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('mofa.list') }}"><i class="fa fa-circle"></i>New Data List</a> ( <span class="text-danger">{{ $mofa_new }}</span> )</li>
                    <li><a href="{{ route('mofa.pending.list') }}"><i class="fa fa-circle"></i>Pending Data List</a> ( <span class="text-danger">{{ $mofa_pending }}</span> )</li>
                    <li><a href="{{ route('mofa.done.list') }}"><i class="fa fa-circle"></i>Done Data List</a> ( <span class="text-danger">{{ $mofa_done }}</span> )</li>
                </ul>
            </li>
            @endif

            <!-- Count Training Certificate -->
            @php
                $tran_new = App\Models\TranCerti::where('tran_date', null)->where('tran_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $tran_pending = App\Models\TranCerti::where('tran_date', '!=', null)->where('tran_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $tran_done = App\Models\TranCerti::where('tran_date', '!=', null)->where('tran_report', '!=', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
            @endphp
            <!-- !Count Training Certificate -->

            @if(Auth::user()->traning_certificate == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="shopping-bag"></i><span>Training Certificate</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('tran.list') }}"><i class="fa fa-circle"></i>New Data List</a> ( <span class="text-danger">{{ $tran_new }}</span> )</li>
                    <li><a href="{{ route('tran.pending.list') }}"><i class="fa fa-circle"></i>Pending Data List</a> ( <span class="text-danger">{{ $tran_pending }}</span> )</li>
                    <li><a href="{{ route('tran.done.list') }}"><i class="fa fa-circle"></i>Done Data List</a> ( <span class="text-danger">{{ $tran_done }}</span> )</li>
                </ul>
            </li>
            @endif

            <!-- Count Visa -->
            @php
                $visa_new = App\Models\Visa::where('visa_date', null)->where('visa_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $visa_pending = App\Models\Visa::where('visa_date', '!=', null)->where('visa_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $visa_done = App\Models\Visa::where('visa_date', '!=', null)->where('visa_report', '!=', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
            @endphp
            <!-- !Count Visa -->

            @if(Auth::user()->visa == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="box"></i><span>Visa</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('visa.list') }}"><i class="fa fa-circle"></i>New Data List</a> ( <span class="text-danger">{{ $visa_new }}</span> )</li>
                    <li><a href="{{ route('visa.pending.list') }}"><i class="fa fa-circle"></i>Pending Data List</a> ( <span class="text-danger">{{ $visa_pending }}</span> )</li>
                    <li><a href="{{ route('visa.done.list') }}"><i class="fa fa-circle"></i>Done Data List</a> ( <span class="text-danger">{{ $visa_done }}</span> )</li>
                </ul>
            </li>
            @endif

            <!-- Count Man Power -->
            @php
                $man_new = App\Models\ManPower::where('man_date', null)->where('man_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $man_pending = App\Models\ManPower::where('man_date', '!=', null)->where('man_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $man_done = App\Models\ManPower::where('man_date', '!=', null)->where('man_report', '!=', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
            @endphp
            <!-- !Count Man Power -->

            @if(Auth::user()->man_power == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="users"></i><span>Man Power</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('man.list') }}"><i class="fa fa-circle"></i>New Data List</a> ( <span class="text-danger">{{ $man_new }}</span> )</li>
                    <li><a href="{{ route('man.pending.list') }}"><i class="fa fa-circle"></i>Pending Data List</a> ( <span class="text-danger">{{ $man_pending }}</span> )</li>
                    <li><a href="{{ route('man.done.list') }}"><i class="fa fa-circle"></i>Done Data List</a> ( <span class="text-danger">{{ $man_done }}</span> )</li>
                </ul>
            </li>
            @endif

            <!-- Count Flight -->
            @php
                $flight_new = App\Models\Flight::where('flight_date', null)->where('flight_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $flight_pending = App\Models\Flight::where('flight_date', '!=', null)->where('flight_report', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
                $flight_done = App\Models\Flight::where('flight_date', '!=', null)->where('flight_report', '!=', null)->where('status', 0)->where('user_id', Auth::user()->id)->count();
            @endphp
            <!-- !Count Flight -->

            @if(Auth::user()->flight == 1)
            <li><a class="sidebar-header" href="#"><i data-feather="navigation"></i><span>Flight</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('flight.list') }}"><i class="fa fa-circle"></i>New Data List</a> ( <span class="text-danger">{{ $flight_new }}</span> )</li>
                    <li><a href="{{ route('flight.pending.list') }}"><i class="fa fa-circle"></i>Pending Data List</a> ( <span class="text-danger">{{ $flight_pending }}</span> )</li>
                    <li><a href="{{ route('flight.done.list') }}"><i class="fa fa-circle"></i>Done Data List</a> ( <span class="text-danger">{{ $flight_done }}</span> )</li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->final_state == 1)
            <li><a class="sidebar-header" href="{{ route('final.state.list') }}"><i class="fa fa-hourglass-end" aria-hidden="true"></i><span>Final State</span></a></li>
            @endif

            @if(Auth::user()->accounts == 1)
            <li><a class="sidebar-header" href="{{ route('accounts.list') }}"><i data-feather="plus"></i><span>Accounts</span></a></li>
            @endif

            @if(Auth::user()->agent == 1)
            <li><a class="sidebar-header" href="{{ route('agents.list') }}"><i data-feather="user"></i><span>Agent</span></a></li>
            @endif

            @if(Auth::user()->country == 1)
            <li><a class="sidebar-header" href="{{ route('countries.list') }}"><i class="fa fa-flag" aria-hidden="true"></i><span>Country</span></a></li>
            @endif

            @if(Auth::user()->processing_media == 1)
            <li><a class="sidebar-header" href="{{ route('processing.list') }}"><i class="fa fa-heartbeat" aria-hidden="true"></i><span>Processing Media</span></a></li>
            @endif

        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->
