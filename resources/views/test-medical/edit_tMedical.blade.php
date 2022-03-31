@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Test Medical
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Test Medical </li>
                        <li class="breadcrumb-item active">Edit Test Medical </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $entry_passport = App\Models\EntryPassport::where('status', 1)->latest()->get();
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Edit Test Medical</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <form class="needs-validation user-add" novalidate="" action="{{ route('update.tMedical', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Entry Passport</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits" id="exampleFormControlSelect1" name="entry_passport_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($entry_passport as $passport)
                                                <option value="{{ $passport->id }}" {{ ($data->id == $passport->id) ? 'selected' : ''  }}>{{ $passport->name }} | {{ $passport->passport_no }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('entry_passport_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Medical Attand Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="medical_attend_date" id="validationCustom0" type="date" value="{{ $data->medical_attend_date }}">
                                        </div>
                                        @error('medical_attend_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Report Delivery Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="report_delivery_date" id="validationCustom0" type="date" value="{{ $data->report_delivery_date }}">
                                        </div>
                                        @error('report_delivery_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Medical Report Status</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="medical_report_status" id="validationCustom0" type="text" value="{{ $data->medical_report_status }}">
                                        </div>
                                        @error('medical_report_status')
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
