@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Create Entry Passport
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Entry Passport </li>
                        <li class="breadcrumb-item active">Create Entry Passport </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Add Entry Passport</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <form action="{{ route('store.passport') }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Date</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="date" id="validationCustom0" type="date" required="">
                                        </div>
                                        @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Name</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="name" id="validationCustom0" type="text" required="">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Passport Number</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="passport_no" id="validationCustom0" type="text" required="">
                                        </div>
                                        @error('passport_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Mobile Number</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="mobile_no" id="validationCustom0" type="text" required="">
                                        </div>
                                        @error('mobile_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Visa Type</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="visa_type" id="validationCustom0" type="text" required="">
                                        </div>
                                        @error('visa_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Reference</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="reference" id="validationCustom0" type="text" required="">
                                        </div>
                                        @error('reference')
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
