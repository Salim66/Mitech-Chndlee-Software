@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Profile Edit
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users </li>
                        <li class="breadcrumb-item active">Profile Edit </li>
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
                        <h5> User Profile Update</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="account-tab">
                                <form class="needs-validation user-add" novalidate="" action="{{ route('update.user.profile', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <h4>Account Details</h4>
                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Name</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="name" id="validationCustom0" type="text" required="" value="{{ $data->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Email</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="email" id="validationCustom2" type="text" required="" value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Mobile</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="mobile" id="validationCustom0" type="text" required="" value="{{ $data->mobile }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Address</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="address" id="validationCustom0" type="text" required="" value="{{ $data->address }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Upload Photo</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="profile_photo_path" id="validationCustom0" type="file" required="">
                                        </div>
                                        <div class="profile-details text-center mt-3">
                                            <img src="{{ (!empty($data->profile_photo_path)) ? URL::to($data->profile_photo_path) : URL::to('assets/images/dashboard/designer.jpg') }}" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded" style="width: 90px; height: 90px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Profile Update</button>
                                    </div>
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
