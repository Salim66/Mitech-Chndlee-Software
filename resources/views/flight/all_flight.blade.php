@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Flight List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Flight</li>
                        <li class="breadcrumb-item active">Flight List</li>
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
                <h5>New Data Details</h5>&nbsp; <span class="badge badge-primary text-white d-inline-block">{{ count($all_data) }}</span>
            </div>
            @if(Auth::user()->agent_id == null)
            <div class="btn-popup">
                <a href="{{ route('trash.flight') }}" class="badge badge-danger float-left ml-4">Trash Flight List</a>
                <a href="{{ route('add.flight') }}" class="btn btn-secondary float-right mr-4">Create Flight</a>
            </div>
            @endif
            <div class="card-body">

                <div class="category-table user-list order-table">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Man Power </th>
                            <th> Flight Date </th>
                            <th> Flight Report </th>
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
                            <td> {{ $data->flight_date }} </td>
                            <td> {{ $data->flight_report }} </td>
                            @if(Auth::user()->agent_id == null)
                            <td style="width: 23%">
                                <a title="Edit" href="{{ route('edit.flight', $data->id) }}" class="btn btn-outline-info btn-sm"><i class='fa fa-pencil'></i></a>

                                <a title="Delete" href="{{ route('delete.flight', $data->id) }}" class="btn btn-sm btn-outline-danger"><i class='fa fa-trash'></i></a>
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
