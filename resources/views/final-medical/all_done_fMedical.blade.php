@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Final Medical List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Final Medical</li>
                        <li class="breadcrumb-item active">Final Medical List</li>
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
                <h5>Done Data Details</h5>&nbsp; <span class="badge badge-primary text-white d-inline-block">{{ count($all_data) }}</span>
            </div>
            <div class="btn-popup">
                @if(Auth::user()->agent_id == null)
                <a href="{{ route('trash.fMedical') }}" class="badge badge-danger float-left ml-4">Trash Final Medical List</a>
                @endif
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
                            @if(Auth::user()->agent_id == null)
                            <th> Action </th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td style="width: 30% !important"> {{ $data->entry->name }} | {{ $data->entry->passport_no }} | {{ $data->entry->mobile_no }}</td>
                            <td> {{ $data->medical_attend_date }} </td>
                            <td> {{ $data->report_delivery_date }} </td>
                            <td> {{ $data->medical_report_status }} </td>
                            @if(Auth::user()->agent_id == null)
                            <td style="width: 23%">
                                <a title="Edit" href="{{ route('edit.fMedical', $data->id) }}" class="btn btn-outline-info btn-sm"><i class='fa fa-pencil'></i></a>

                                <a title="Done" href="{{ route('status.fMedical', $data->id) }}" class="btn btn-outline-success btn-sm"><i class='fa fa-thumbs-up'></i></a>

                                <a title="Delete" href="{{ route('delete.fMedical', $data->id) }}" class="btn btn-sm btn-outline-danger"><i class='fa fa-trash'></i></a>
                            </td>
                            @endif
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
