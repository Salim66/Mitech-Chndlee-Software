@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Create User
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users </li>
                        <li class="breadcrumb-item active">Create User </li>
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
                        <h5> Add User</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active show" id="account-tab" data-bs-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true" data-original-title="" title="">Account</a></li>
                            <li class="nav-item"><a class="nav-link" id="permission-tabs" data-bs-toggle="tab" href="#permission" role="tab" aria-controls="permission" aria-selected="false" data-original-title="" title="">Permission</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <form class="needs-validation user-add" novalidate="" action="{{ route('store.user') }}" method="POST">
                                    @csrf

                                    <h4>Account Details</h4>
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
                                        <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Email</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="email" id="validationCustom2" type="text" required="">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span> Password</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="password" id="validationCustom3" type="password" required="">
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span> Confirm Password</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="password_confirmation" id="validationCustom4" type="password" required="">
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="permission" role="tabpanel" aria-labelledby="permission-tabs">
                                    <div class="permission-block">
                                        <div class="attribute-blocks">
                                            <h5 class="f-w-600 mb-3">Account Details </h5>
                                            <div class="row">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label>Users</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                        <label class="d-block mr-3" for="edo-ani1">
                                                            <input class="radio_animated" id="edo-ani1" type="radio" name="users" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block" for="edo-ani2">
                                                            <input class="radio_animated" id="edo-ani2" type="radio" name="users" checked="" value="0">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label>Entery Passport</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                        <label class="d-block mr-3" for="edo-ani3">
                                                            <input class="radio_animated" id="edo-ani3" type="radio" name="entery_passport" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block" for="edo-ani4">
                                                            <input class="radio_animated" id="edo-ani4" type="radio" name="entery_passport" checked="" value="0">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label>Test Medical</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                        <label class="d-block mr-3" for="edo-ani5">
                                                            <input class="radio_animated" id="edo-ani5" type="radio" name="test_medical" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block" for="edo-ani6">
                                                            <input class="radio_animated" id="edo-ani6" type="radio" name="test_medical" checked="" value="0">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label class="mb-0 sm-label-radio">Final Medical</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                        <label class="d-block mb-0 mr-3" for="edo-ani7">
                                                            <input class="radio_animated" id="edo-ani7" type="radio" name="final_medical" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block mb-0" for="edo-ani8">
                                                            <input class="radio_animated" id="edo-ani8" type="radio" name="final_medical" value="0" checked="">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label class="mb-0 sm-label-radio">Police Clearance</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                        <label class="d-block mb-0 mr-3" for="edo-ani7">
                                                            <input class="radio_animated" id="edo-ani7" type="radio" name="police_clearance" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block mb-0" for="edo-ani8">
                                                            <input class="radio_animated" id="edo-ani8" type="radio" name="police_clearance" value="0" checked="">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label class="mb-0 sm-label-radio">Mofa</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                        <label class="d-block mb-0 mr-3" for="edo-ani7">
                                                            <input class="radio_animated" id="edo-ani7" type="radio" name="mofa" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block mb-0" for="edo-ani8">
                                                            <input class="radio_animated" id="edo-ani8" type="radio" name="mofa" value="0" checked="">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label class="mb-0 sm-label-radio">Visa</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                        <label class="d-block mb-0 mr-3" for="edo-ani7">
                                                            <input class="radio_animated" id="edo-ani7" type="radio" name="visa" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block mb-0" for="edo-ani8">
                                                            <input class="radio_animated" id="edo-ani8" type="radio" name="visa" value="0" checked="">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label class="mb-0 sm-label-radio">Traning Certificate</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                        <label class="d-block mb-0 mr-3" for="edo-ani7">
                                                            <input class="radio_animated" id="edo-ani7" type="radio" name="traning_certificate" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block mb-0" for="edo-ani8">
                                                            <input class="radio_animated" id="edo-ani8" type="radio" name="traning_certificate" value="0" checked="">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label class="mb-0 sm-label-radio">Man Power</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                        <label class="d-block mb-0 mr-3" for="edo-ani7">
                                                            <input class="radio_animated" id="edo-ani7" type="radio" name="man_power" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block mb-0" for="edo-ani8">
                                                            <input class="radio_animated" id="edo-ani8" type="radio" name="man_power" value="0" checked="">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label class="mb-0 sm-label-radio">Flight</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                        <label class="d-block mb-0 mr-3" for="edo-ani7">
                                                            <input class="radio_animated" id="edo-ani7" type="radio" name="flight" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block mb-0" for="edo-ani8">
                                                            <input class="radio_animated" id="edo-ani8" type="radio" name="flight" value="0" checked="">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label class="mb-0 sm-label-radio">Accounts</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                        <label class="d-block mb-0 mr-3" for="edo-ani7">
                                                            <input class="radio_animated" id="edo-ani7" type="radio" name="accounts" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block mb-0" for="edo-ani8">
                                                            <input class="radio_animated" id="edo-ani8" type="radio" name="accounts" value="0" checked="">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-xl-3 col-sm-4">
                                                    <label class="mb-0 sm-label-radio">Agent</label>
                                                </div>
                                                <div class="col-xl-9 col-sm-8">
                                                    <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                        <label class="d-block mb-0 mr-3" for="edo-ani7">
                                                            <input class="radio_animated" id="edo-ani7" type="radio" name="agent" value="1">
                                                            Allow
                                                        </label>
                                                        <label class="d-block mb-0" for="edo-ani8">
                                                            <input class="radio_animated" id="edo-ani8" type="radio" name="agent" value="0" checked="">
                                                            Deny
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
