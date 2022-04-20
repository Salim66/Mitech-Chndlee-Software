@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Flight
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Flight </li>
                        <li class="breadcrumb-item active">Create Flight </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $final_medical = App\Models\ManPower::with('entry')->where('status', 1)->latest()->get();
        $select_flight = App\Models\Flight::all();
        $flight = [];
        foreach ($select_flight as $s_flight){
            array_push($flight, $s_flight -> man_id);
        }
        // dd($select_police_medical);
        // dd($final_medical);
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Add Flight</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="account-tab">
                                <form action="{{ route('store.flight') }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Man Power</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="man_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($final_medical as $fmediacl)

                                                @if(in_array($fmediacl->visa_id, $flight))

                                                @else
                                                <option value="{{ $fmediacl->entry->id }}">{{ $fmediacl->entry->name }} | {{ $fmediacl->entry->passport_no }}</option>
                                                @endif

                                                @endforeach
                                            </select>
                                        </div>
                                        @error('man_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Man Power Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="flight_date" id="validationCustom0" type="date">
                                        </div>
                                        @error('flight_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>flight Power Report</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="flight_report" id="validationCustom0" type="text">
                                        </div>
                                        @error('flight_report')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection
