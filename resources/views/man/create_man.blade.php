@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Man Power
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Man Power </li>
                        <li class="breadcrumb-item active">Create Man Power </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $final_medical = App\Models\Visa::with('entry')->where('status', 1)->latest()->get();
        $man_power = App\Models\ManPower::all();
        $power = [];
        foreach ($man_power as $man){
            array_push($power, $man -> tran_id);
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
                        <h5> Add Man Power</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="account-tab">
                                <form action="{{ route('store.man') }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Training Certificate</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="tran_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($final_medical as $fmediacl)

                                                @if(in_array($fmediacl->visa_id, $power))

                                                @else
                                                <option value="{{ $fmediacl->entry->id }}">{{ $fmediacl->entry->name }} | {{ $fmediacl->entry->passport_no }}</option>
                                                @endif

                                                @endforeach
                                            </select>
                                        </div>
                                        @error('tran_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Man Power Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="man_date" id="validationCustom0" type="date">
                                        </div>
                                        @error('man_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Man Power Report</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="man_report" id="validationCustom0" type="text">
                                        </div>
                                        @error('man_report')
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
