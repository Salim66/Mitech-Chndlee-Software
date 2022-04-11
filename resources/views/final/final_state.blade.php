@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Final State List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Final State</li>
                        <li class="breadcrumb-item active">Final State List</li>
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
                <h5>Final State Details</h5>&nbsp; <span class="badge badge-primary text-white d-inline-block">{{ count($all_data) }}</span>
            </div>
            <div class="card-body">

                <div class="category-table user-list order-table">
                    <table id="table_id" class="table table-bordered table-striped table-responsive">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Pas.No </th>
                            <th> Mob.No </th>
                            <th> Visa Ty </th>
                            <th> Ag.Name </th>
                            <th> C.Name </th>
                            <th> P.M.Name </th>
                            <th> T.M.S </th>
                            <th> F.M.S </th>
                            <th> P.C.S </th>
                            <th> M.R </th>
                            <th> T.C.R </th>
                            <th> V.R </th>
                            <th> M.P.R </th>
                            <th> F.R </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->passport_no }} </td>
                            <td> {{ $data->mobile_no }} </td>
                            <td> {{ $data->visa_type }} </td>
                            <td> {{ $data->agents->name }} </td>
                            <td> {{ $data->countries->country_name }} </td>
                            <td> {{ $data->processings->processing_media_name }} </td>
                            <td> {{ @$data->test_medicals->medical_report_status }} </td>
                            <td> {{ @$data->final_medicals->medical_report_status }} </td>
                            <td> {{ @$data->police_clearances->police_clearance_report }} </td>
                            <td> {{ @$data->mofas->mofa_report }} </td>
                            <td> {{ @$data->tran_certis->tran_report }} </td>
                            <td> {{ @$data->visas->visa_report }} </td>
                            <td> {{ @$data->man_powers->man_report }} </td>
                            <td> {{ @$data->flights->flight_report }} </td>
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
