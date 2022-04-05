@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Account Trash List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Accounts</li>
                        <li class="breadcrumb-item active">Account Trash List</li>
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
                <h5>Account Details</h5>
            </div>
            <div class="btn-popup">
                <a href="{{ route('accounts.list') }}" class="badge badge-primary float-left ml-4">Accounts List</a>
                <a href="{{ route('add.account') }}" class="btn btn-secondary float-right mr-4">Create Account</a>
            </div>
            <div class="card-body">

                <div class="category-table order-table">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Agent Name </th>
                            <th> Amount </th>
                            <th> Purpose </th>
                            <th> Payment Receive Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td style="width: 20% !important"> {{ $data->agents->name }} </td>
                            <td> {{ $data->amount }} </td>
                            <td> {{ $data->purpose }} </td>
                            <td> {{ $data->payment_status }} </td>
                            <td style="width: 16%">
                                <a title="Recover" href="{{ route('recover.account', $data->id) }}" class="btn btn-outline-success btn-sm"><i class='fa fa-trash'></i></a>

                                <a title="Permanent Delete" id="delete" href="{{ route('permanent.delete.account', $data->id) }}" class="btn btn-sm btn-outline-primary"><i class='fa fa-times'></i></a>
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
