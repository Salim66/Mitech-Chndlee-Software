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
                        <li class="breadcrumb-item active">Edit Man Power </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $final_medical = App\Models\Visa::with('entry')->where('status', 1)->where('user_id', Auth::user()->id)->latest()->get();
        // dd($final_medical);
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Edit Man Power</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="account-tab">
                                <form class="needs-validation user-add" novalidate="" action="{{ route('update.man', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Visa</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="visa_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($final_medical as $fmediacl)

                                                <option value="{{ $fmediacl->entry->id }}" {{ ($data->visa_id == $fmediacl->entry->id) ? 'selected' : ''  }}>{{ $fmediacl->entry->name }} | {{ $fmediacl->entry->passport_no }} | {{ $fmediacl->entry->mobile_no }}</option>


                                                @endforeach
                                            </select>
                                        </div>
                                        @error('visa_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Man Power Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="man_date" id="validationCustom0" type="date" value="{{ $data->man_date }}">
                                        </div>
                                        @error('man_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Man Power Report</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="man_report" id="validationCustom0" type="text" value="{{ $data->man_report }}">
                                        </div>
                                        @error('man_report')
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
