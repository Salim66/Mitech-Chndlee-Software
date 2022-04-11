@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Entry Passport Trash List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Entry Passport</li>
                        <li class="breadcrumb-item active">Entry Passport Trash List</li>
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
                <a href="{{ route('passport.list') }}" class="badge badge-primary float-left ml-4">Entry Passport List</a>
                <a href="{{ route('add.passport') }}" class="btn btn-secondary float-right mr-4">Create Entry Passport</a>
            </div>
            <div class="card-body">

                <div class="category-table user-list order-table">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Date </th>
                            <th> Name </th>
                            <th> Passport No. </th>
                            <th> Mobile No. </th>
                            <th> Visa Type </th>
                            <th> Agent Name </th>
                            <th> Country Name </th>
                            <th> P.Media Name </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td> {{ $data->date }} </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->passport_no }} </td>
                            <td> {{ $data->mobile_no }} </td>
                            <td> {{ $data->visa_type }} </td>
                            <td> {{ $data->agents->name }} </td>
                            <td> {{ $data->countries->country_name }} </td>
                            <td> {{ $data->processings->processing_media_name }} </td>
                            <td style="width: 16%">
                                <a title="Recover" href="{{ route('recover.passport', $data->id) }}" class="btn btn-outline-success btn-sm"><i class='fa fa-trash'></i></a>

                                <a title="Permanent Delete" id="delete" href="{{ route('permanent.delete.passport', $data->id) }}" class="btn btn-sm btn-outline-primary"><i class='fa fa-times'></i></a>
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
