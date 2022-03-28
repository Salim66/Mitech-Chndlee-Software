@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Profile
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-details text-center">
                            <img src="{{ (!empty($data->profile_photo_path)) ? URL::to($data->profile_photo_path) : URL::to('assets/images/dashboard/designer.jpg') }}" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded" style="width: 90px; height: 90px; object-fit: cover;">
                            <h5 class="f-w-600 mb-0">{{ $data->name }}</h5>
                            <span>{{ $data->email }}</span>
                        </div>
                        <hr>
                        <div class="project-status">
                            <div class="media">
                                <div class="media-body text-center">
                                    <a href="{{ route('user.profile.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card tab2-card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Profile</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                <h5 class="f-w-600">Profile</h5>
                                <div class="table-responsive profile-table">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td>{{ $data->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td>{{ $data->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile:</td>
                                                <td>{{ $data->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td>{{ $data->address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
