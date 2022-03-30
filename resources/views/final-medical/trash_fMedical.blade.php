@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Final Medical Trash List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Final Medical</li>
                        <li class="breadcrumb-item active">Final Medical Trash List</li>
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
                <h5>Final Medical Details</h5>
            </div>
            <div class="btn-popup">
                <a href="{{ route('fMedical.list') }}" class="badge badge-primary float-left ml-4">Final Medical List</a>
                <a href="{{ route('add.fMedical') }}" class="btn btn-secondary float-right mr-4">Create Final Medical</a>
            </div>
            <div class="card-body">

                <div class="category-table user-list order-table">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Test Medical </th>
                            <th> Medical Attand Date </th>
                            <th> Report Delivery Date </th>
                            <th> Medical Report Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td style="width: 30% !important"> {{ $data->entry->name }} | {{ $data->entry->passport_no }}</td>
                            <td> {{ $data->medical_attend_date }} </td>
                            <td> {{ $data->report_delivery_date }} </td>
                            <td> {{ $data->medical_report_status }} </td>
                            <td style="width: 16%">
                                <a title="Recover" href="{{ route('recover.fMedical', $data->id) }}" class="btn btn-outline-success btn-sm"><i class='fa fa-trash'></i></a>

                                <a title="Permanent Delete" id="delete" href="{{ route('permanent.delete.fMedical', $data->id) }}" class="btn btn-sm btn-outline-primary"><i class='fa fa-times'></i></a>
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
