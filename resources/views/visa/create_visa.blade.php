@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Create Visa
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Visa </li>
                        <li class="breadcrumb-item active">Create Visa </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $final_medical = App\Models\TranCerti::with('entry')->where('status', 1)->latest()->get();
        $visa_all = App\Models\Visa::all();
        $visa = [];
        foreach ($visa_all as $vi){
            array_push($visa, $vi -> mofa_id);
        }
        // dd($select_police_medical);
        // dd($test_medical);
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Add Visa</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="account-tab">
                                <form action="{{ route('store.visa') }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Mofa</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="mofa_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($final_medical as $fmediacl)

                                                @if(in_array($fmediacl->police_clearance_id, $visa))

                                                @else
                                                <option value="{{ $fmediacl->entry->id }}">{{ $fmediacl->entry->name }} | {{ $fmediacl->entry->passport_no }}</option>
                                                @endif

                                                @endforeach
                                            </select>
                                        </div>
                                        @error('mofa_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Visa Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="visa_date" id="validationCustom0" type="date">
                                        </div>
                                        @error('visa_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Visa Report</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="visa_report" id="validationCustom0" type="text">
                                        </div>
                                        @error('visa_report')
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
