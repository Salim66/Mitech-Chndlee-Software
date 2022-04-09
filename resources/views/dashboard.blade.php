@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Dashboard
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $entry_count = App\Models\EntryPassport::where('status', 0)->count();
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            @if(Auth::user()->entery_passport == 1)
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-warning card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Entry Passport</span>
                                <h3 class="mb-0"><span class="counter">{{ $entry_count }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @php
                $test_m_count_ep = App\Models\EntryPassport::where('status', 1)->count();
                $test_m_count_tm_active = App\Models\TestMedical::count();

                $test_medical_pending_count = $test_m_count_ep - $test_m_count_tm_active;

                $tmpc = 0;
                if($test_m_count_ep == $test_m_count_tm_active){
                    $tmpc = 0;
                }else {
                    if($test_medical_pending_count > 0){
                        $tmpc = $test_medical_pending_count;
                    }else {
                        $tmpc = 0;
                    }
                }

                // dd($test_m_count_tm_active);
            @endphp

            @if(Auth::user()->test_medical == 1)
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden  widget-cards">
                    <div class="bg-secondary card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Test Medical Create Pending</span>
                                <h3 class="mb-0"> <span class="counter">{{ $tmpc }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @php
                $test_m_count_tm_one = App\Models\TestMedical::where('status', 1)->count();
                $test_m_count_fm_active = App\Models\FinalMedical::count();

                $test_medical_pending_count_fm = $test_m_count_tm_one - $test_m_count_fm_active;

                $fmtm = 0;
                if($test_m_count_tm_one == $test_m_count_fm_active){
                    $fmtm = 0;
                }else {
                    if($test_medical_pending_count_fm > 0){
                        $fmtm = $test_medical_pending_count_fm;
                    }else {
                        $fmtm = 0;
                    }
                }

                // dd($test_m_count_fm_active);
            @endphp

            @if(Auth::user()->final_medical == 1)
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-primary card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Final Medical Create Pending</span>
                                <h3 class="mb-0"><span class="counter">{{ $fmtm }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @php
                $test_m_count_fm_one = App\Models\FinalMedical::where('status', 1)->count();
                $test_m_count_pc_active = App\Models\PoliceClearance::count();



                $test_medical_pending_count_pc = $test_m_count_fm_one - $test_m_count_pc_active;

                $pcfm = 0;
                if($test_m_count_fm_one == $test_m_count_pc_active){
                    $pcfm = 0;
                }else {
                    if($test_medical_pending_count_pc > 0){
                        $pcfm = $test_medical_pending_count_pc;
                    }else {
                        $pcfm = 0;
                    }
                }

                // dd($pcfm);
            @endphp

            @if(Auth::user()->police_clearance == 1)
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-danger card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Police Clearance Create Pending</span>
                                <h3 class="mb-0"><span class="counter">{{ $pcfm }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- Container-fluid Ends-->



    @php
        $test_m_count_pc_one = App\Models\PoliceClearance::where('status', 1)->count();
        $test_m_count_mofa_active = App\Models\Mofa::count();



        $test_medical_pending_count_mofa = $test_m_count_pc_one - $test_m_count_mofa_active;

        $mofapc = 0;
        if($test_m_count_pc_one == $test_m_count_mofa_active){
            $mofapc = 0;
        }else {
            if($test_medical_pending_count_mofa > 0){
                $mofapc = $test_medical_pending_count_mofa;
            }else {
                $mofapc = 0;
            }
        }

        // dd($mofapc);
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">

            @if(Auth::user()->mofa == 1)
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-warning card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Mofa Create Pending</span>
                                <h3 class="mb-0"><span class="counter">{{ $mofapc }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @php
                $test_m_count_visa_one = App\Models\Mofa::where('status', 1)->count();
                $test_m_count_trancer_active = App\Models\TranCerti::count();



                $test_medical_pending_count_trancer = $test_m_count_visa_one - $test_m_count_trancer_active;

                $tranvisa = 0;
                if($test_m_count_visa_one == $test_m_count_trancer_active){
                    $tranvisa = 0;
                }else {
                    if($test_medical_pending_count_trancer > 0){
                        $tranvisa = $test_medical_pending_count_trancer;
                    }else {
                        $tranvisa = 0;
                    }
                }
            @endphp

            @if(Auth::user()->traning_certificate == 1)
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-primary card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Training Certificate Create Pending</span>
                                <h3 class="mb-0"><span class="counter">{{ $tranvisa }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @php
                $test_m_count_mofa_one = App\Models\TranCerti::where('status', 1)->count();
                $test_m_count_visa_active = App\Models\Visa::count();



                $test_medical_pending_count_visa = $test_m_count_mofa_one - $test_m_count_visa_active;

                $visamofa = 0;
                if($test_m_count_mofa_one == $test_m_count_visa_active){
                    $visamofa = 0;
                }else {
                    if($test_medical_pending_count_visa > 0){
                        $visamofa = $test_medical_pending_count_visa;
                    }else {
                        $visamofa = 0;
                    }
                }

                // dd($visamofa);
            @endphp

            @if(Auth::user()->visa == 1)
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden  widget-cards">
                    <div class="bg-secondary card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Visa Create Pending</span>
                                <h3 class="mb-0"><span class="counter">{{ $visamofa }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @php
                $test_m_count_tran_one = App\Models\Visa::where('status', 1)->count();
                $test_m_count_manpower_active = App\Models\ManPower::count();



                $test_medical_pending_count_manpower = $test_m_count_tran_one - $test_m_count_manpower_active;

                $manpowertran = 0;
                if($test_m_count_tran_one == $test_m_count_manpower_active){
                    $manpowertran = 0;
                }else {
                    if($test_medical_pending_count_manpower > 0){
                        $manpowertran = $test_medical_pending_count_manpower;
                    }else {
                        $manpowertran = 0;
                    }
                }

            @endphp

            @if(Auth::user()->man_power == 1)
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-danger card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Man Power Create Pending</span>
                                <h3 class="mb-0"><span class="counter">{{ $manpowertran }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- Container-fluid Ends-->



    @php
        $test_m_count_manpower_one = App\Models\ManPower::where('status', 1)->count();
        $test_m_count_flight_active = App\Models\Flight::count();



        $test_medical_pending_count_flight = $test_m_count_manpower_one - $test_m_count_flight_active;

        $flightman = 0;
        if($test_m_count_manpower_one == $test_m_count_flight_active){
            $flightman = 0;
        }else {
            if($test_medical_pending_count_flight > 0){
                $flightman = $test_medical_pending_count_flight;
            }else {
                $flightman = 0;
            }
        }

    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">

            @if(Auth::user()->flight == 1)
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-warning card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Flight Create Pending</span>
                                <h3 class="mb-0"><span class="counter">{{ $flightman }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection
