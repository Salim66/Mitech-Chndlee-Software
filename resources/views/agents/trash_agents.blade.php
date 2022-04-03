@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Agent Trash List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Agents</li>
                        <li class="breadcrumb-item active">Agent Trash List</li>
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
                <h5>Agent Details</h5>
            </div>
            <div class="btn-popup">
                <a href="{{ route('agents.list') }}" class="badge badge-primary float-left ml-4">Agents List</a>
                <a href="{{ route('add.agent') }}" class="btn btn-secondary float-right mr-4">Create Agent</a>
            </div>
            <div class="card-body">

                <div class="category-table order-table">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Phone </th>
                            <th> Email </th>
                            <th> Address </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->phone }} </td>
                            <td> {{ $data->email }} </td>
                            <td> {{ $data->address }} </td>
                            <td style="width: 16%">
                                <a title="Recover" href="{{ route('recover.agent', $data->id) }}" class="btn btn-outline-success btn-sm"><i class='fa fa-trash'></i></a>

                                <a title="Permanent Delete" id="delete" href="{{ route('permanent.delete.agent', $data->id) }}" class="btn btn-sm btn-outline-primary"><i class='fa fa-times'></i></a>
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
