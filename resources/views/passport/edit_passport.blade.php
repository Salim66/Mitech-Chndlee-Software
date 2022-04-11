@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Entry Passport User
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Entry Passport </li>
                        <li class="breadcrumb-item active">Edit Entry Passport </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $agents = App\Models\Agent::latest()->get();
        $countries = App\Models\Country::latest()->get();
        $processing = App\Models\Processing::latest()->get();
        // dd($agents);
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Edit Entry Passport</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="account-tab">
                                <form class="needs-validation user-add" novalidate="" action="{{ route('update.passport', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="date" id="validationCustom0" type="date" required="" value="{{ $data->date }}">
                                        </div>
                                        @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Name</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="name" id="validationCustom0" type="text" required="" value="{{ $data->name }}">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Passport Number</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="passport_no" id="validationCustom0" type="text" required="" value="{{ $data->passport_no }}">
                                        </div>
                                        @error('passport_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Mobile Number</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="mobile_no" id="validationCustom0" type="text" required="" value="{{ $data->mobile_no }}">
                                        </div>
                                        @error('mobile_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Visa Type</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="visa_type" id="validationCustom0" type="text" required=""  value="{{ $data->visa_type }}">
                                        </div>
                                        @error('visa_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Select Agent</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="agent_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($agents as $agent)
                                                <option value="{{ $agent->id }}" {{ ($data->agent_id == $agent->id) ? 'selected' : '' }}>{{ $agent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('agent_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Select Country Name</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="country_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ ($data->country_id == $country->id) ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('country_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Select Processing Media Name</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="processing_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($processing as $proce)
                                                <option value="{{ $proce->id }}" {{ ($data->processing_id == $proce->id) ? 'selected' : '' }}>{{ $proce->processing_media_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('processing_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
