@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Create Final Medical
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Final Medical </li>
                        <li class="breadcrumb-item active">Create Final Medical </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $test_medical = App\Models\TestMedical::with('entry')->where('status', 1)->where('user_id', Auth::user()->id)->latest()->get();
        $final_medical = App\Models\FinalMedical::all();
        $select_final_medical = [];
        foreach ($final_medical as $final){
            array_push($select_final_medical, $final -> test_medical_id);
        }
        // dd($select_final_medical);
        // dd($test_medical);
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Add Final Medical</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="account-tab">
                                <form action="{{ route('store.fMedical') }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Test Medical</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="test_medical_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($test_medical as $tmediacl)

                                                @if(in_array($tmediacl->entry_passport_id, $select_final_medical))

                                                @else
                                                <option value="{{ $tmediacl->entry->id }}">{{ $tmediacl->entry->name }} | {{ $tmediacl->entry->passport_no }}</option>
                                                @endif

                                                @endforeach
                                            </select>
                                        </div>
                                        @error('test_medical_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Medical Attand Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="medical_attend_date" id="validationCustom0" type="date">
                                        </div>
                                        @error('medical_attend_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Report Delivery Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="report_delivery_date" id="validationCustom0" type="date">
                                        </div>
                                        @error('report_delivery_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Medical Report Status</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="medical_report_status" id="validationCustom0" type="text">
                                        </div>
                                        @error('medical_report_status')
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
