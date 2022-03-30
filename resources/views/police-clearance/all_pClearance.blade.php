@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Police Clearance List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Police Clearance</li>
                        <li class="breadcrumb-item active">Police Clearance List</li>
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
                <h5>Police Clearance Details</h5>
            </div>
            <div class="btn-popup">
                <a href="{{ route('trash.pClearance') }}" class="badge badge-danger float-left ml-4">Trash Police Clearance List</a>
                <a href="{{ route('add.pClearance') }}" class="btn btn-secondary float-right mr-4">Create Police Clearance</a>
            </div>
            <div class="card-body">

                <div class="category-table user-list order-table">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Final Medical </th>
                            <th> Police Clearance Date </th>
                            <th> Police Clearance Report </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td style="width: 30% !important"> {{ $data->entry->name }} | {{ $data->entry->passport_no }}</td>
                            <td> {{ $data->police_clearance_date }} </td>
                            <td> {{ $data->police_clearance_report }} </td>
                            <td style="width: 23%">
                                <a title="Edit" href="{{ route('edit.pClearance', $data->id) }}" class="btn btn-outline-info btn-sm"><i class='fa fa-pencil'></i></a>

                                <a title="Done" href="{{ route('status.pClearance', $data->id) }}" class="btn btn-outline-success btn-sm"><i class='fa fa-thumbs-up'></i></a>

                                <a title="Delete" href="{{ route('delete.pClearance', $data->id) }}" class="btn btn-sm btn-outline-danger"><i class='fa fa-trash'></i></a>
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
