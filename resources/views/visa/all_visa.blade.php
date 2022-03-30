@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Visa List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Visa</li>
                        <li class="breadcrumb-item active">Visa List</li>
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
                <h5>Visa Details</h5>
            </div>
            <div class="btn-popup">
                <a href="{{ route('trash.visa') }}" class="badge badge-danger float-left ml-4">Trash Visa List</a>
                <a href="{{ route('add.visa') }}" class="btn btn-secondary float-right mr-4">Create Visa</a>
            </div>
            <div class="card-body">

                <div class="category-table user-list order-table">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Mofa </th>
                            <th> Visa Date </th>
                            <th> Visa Report </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td style="width: 30% !important"> {{ $data->entry->name }} | {{ $data->entry->passport_no }}</td>
                            <td> {{ $data->visa_date }} </td>
                            <td> {{ $data->visa_report }} </td>
                            <td style="width: 23%">
                                <a title="Edit" href="{{ route('edit.visa', $data->id) }}" class="btn btn-outline-info btn-sm"><i class='fa fa-pencil'></i></a>

                                <a title="Done" href="{{ route('status.visa', $data->id) }}" class="btn btn-outline-success btn-sm"><i class='fa fa-thumbs-up'></i></a>

                                <a title="Delete" href="{{ route('delete.visa', $data->id) }}" class="btn btn-sm btn-outline-danger"><i class='fa fa-trash'></i></a>
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
