@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>User Trash List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">User Trash List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>User Details</h5>
            </div>
            <div class="btn-popup">
                <a href="{{ route('users.list') }}" class="badge badge-primary float-left ml-4">Users List</a>
                <a href="{{ route('add.user') }}" class="btn btn-secondary float-right mr-4">Create User</a>
            </div>
            <div class="card-body">

                <div class="category-table user-list order-table">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Role </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td style="width: 25% !important"> {{ $data->name ? $data->name : $data->agents->name }} </td>
                            <td>
                                @if($data->users == 1)
                                <span class="badge badge-primary">Users</span>
                                @else
                                @endif

                                @if($data->entery_passport == 1)
                                <span class="badge badge-info">Entery Passport</span>
                                @else
                                @endif

                                @if($data->test_medical == 1)
                                <span class="badge badge-success">Test Medical</span>
                                @else
                                @endif

                                @if($data->final_medical == 1)
                                <span class="badge badge-warning">Final Medical</span>
                                @else
                                @endif

                                @if($data->police_clearance == 1)
                                <span class="badge badge-secondary">Police Clearance</span>
                                @else
                                @endif

                                @if($data->mofa == 1)
                                <span class="badge badge-danger">Mofa</span>
                                @else
                                @endif

                                @if($data->visa == 1)
                                <span class="badge badge-primary">Visa</span>
                                @else
                                @endif

                                @if($data->traning_certificate == 1)
                                <span class="badge badge-info">Traning Certificate</span>
                                @else
                                @endif

                                @if($data->man_power == 1)
                                <span class="badge badge-danger">Man Power</span>
                                @else
                                @endif

                                @if($data->flight == 1)
                                <span class="badge badge-warning">Flight</span>
                                @else
                                @endif

                                @if($data->accounts == 1)
                                <span class="badge badge-primary">Accounts</span>
                                @else
                                @endif

                                @if($data->agent == 1)
                                <span class="badge badge-secondary">Agent</span>
                                @else
                                @endif
                            </td>
                            <td style="width: 16%">
                                <a title="Recover" href="{{ route('recover.user', $data->id) }}" class="btn btn-outline-success btn-sm"><i class='fa fa-trash'></i></a>

                                <a title="Permanent Delete" id="delete" href="{{ route('permanent.delete.user', $data->id) }}" class="btn btn-sm btn-outline-primary"><i class='fa fa-times'></i></a>
                            </td>
                          </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection
