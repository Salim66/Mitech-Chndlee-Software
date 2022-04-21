@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Create Trainint Certificate
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Trainint Certificate </li>
                        <li class="breadcrumb-item active">Create Trainint Certificate </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $final_medical = App\Models\Mofa::with('entry')->where('status', 1)->latest()->get();
        $tran_certi = App\Models\TranCerti::all();
        $certificate = [];
        foreach ($tran_certi as $tran){
            array_push($certificate, $tran -> mofa_id);
        }
        // dd($certificate);
        // dd($final_medical);
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Add Trainint Certificate</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="account-tab">
                                <form action="{{ route('store.tran') }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Mofa</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="mofa_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($final_medical as $fmediacl)

                                                @if(in_array($fmediacl->police_clearance_id, $certificate))

                                                @else
                                                <option value="{{ $fmediacl->entry->id }}">{{ $fmediacl->entry->name }} | {{ $fmediacl->entry->passport_no }} | {{ $fmediacl->entry->mobile_no }}</option>
                                                @endif

                                                @endforeach
                                            </select>
                                        </div>
                                        @error('mofa_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Trainint Certificate Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="tran_date" id="validationCustom0" type="date">
                                        </div>
                                        @error('tran_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Trainint Certificate Report</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="tran_report" id="validationCustom0" type="text">
                                        </div>
                                        @error('tran_report')
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
