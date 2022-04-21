@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Account List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Accounts</li>
                        <li class="breadcrumb-item active">Account List</li>
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
                <a href="{{ route('trash.account') }}" class="badge badge-danger float-left ml-4">Trash Account List</a>
                <a href="{{ route('add.account') }}" class="btn btn-secondary float-right mr-4">Create Account</a>
            </div>

            @php
                $entry_passport = App\Models\EntryPassport::latest()->get();
            @endphp
            <!-- Start Search Panel -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Select Passenger Name</label>
                            <select name="passenger_id" class="form-control js-example-disabled-results select2" id="passenger_id" style="width: 100%;">
                                <option selected disabled> - Select - </option>
                                @foreach($entry_passport as $passen)
                                <option value="{{ $passen->id }}">{{ $passen->name }} | {{ $passen->passport_no }} | {{ $passen->mobile_no }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Form Date:</label>

                            <div class="input-group date">
                              <input type="date" class="form-control pull-right" id="from_data">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>To Date:</label>

                            <div class="input-group date">
                              <input type="date" class="form-control pull-right" id="to_data">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-3" style="margin-top: 30px;">
                        <div class="form-group">
                            <input title="Filter" type="button" name="filter" id="filter" class="btn btn-sm btn-outline-primary" value="Search" />
                            <input title="Refresh" type="button" name="refresh" id="refresh" class="btn btn-sm btn-outline-dark" value="Refresh" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Panel -->
            <div class="card-body">

                <div>
                    <table id="account" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Passenger Name </th>
                            <th> Passport No. </th>
                            <th> Mobile No. </th>
                            <th> Date </th>
                            <th> Purpose </th>
                            <th> Payment Receive Status </th>
                            <th> Amount </th>
                            <th style="width: 18%;"> Action </th>
                          </tr>
                        </thead>
                        {{-- <tbody>

                        @foreach($all_data as $data)
                          <tr>
                            <td style="width: 5% !important"> {{ $loop->index+1 }} </td>
                            <td style="width: 20% !important"> {{ $data->agents->name }} </td>
                            <td> {{ $data->purpose }} </td>
                            <td> {{ $data->payment_receive_status }} </td>
                            <td> {{ $data->amount }} </td>
                            <td style="width: 16%">
                                <a title="Edit" href="{{ route('edit.account', $data->id) }}" class="btn btn-outline-info btn-sm"><i class='fa fa-pencil'></i></a>

                                <a title="Delete" href="{{ route('delete.account', $data->id) }}" class="btn btn-sm btn-outline-danger"><i class='fa fa-trash'></i></a>
                            </td>
                          </tr>
                        @endforeach

                        </tbody> --}}
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="7" style="text-align: right; font-weight: bold;">Total Amount</th>
                                <th rowspan="1" colspan="1" style="text-align: left; font-weight: bold;" class="total_account"></th>
                                <th rowspan="1" colspan="1"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->


</div>

<!-- Modal -->
<div class="modal center-modal fade account_edit" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Account</h5>
        </div>
        <form method="POST" id="edit_account_form">
            <div class="modal-body">

                    <div class="form-group">
                        <label for="">Select Passenger Name</label>
                        <select name="passenger_id" class="form-control account_name select2 d-block" style="width: 100%;">

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="number" name="amount" class="form-control account_amount">
                    </div>

                    <div class="form-group">
                        <label for="">Purpose</label>
                        <input type="text" name="purpose" class="form-control account_purpose">
                        <input type="hidden" name="id" class="form-control account_id">
                    </div>

                    <div class="form-group">
                        <label for="">Payment Receive Status</label>
                        <input type="text" name="payment_receive_status" class="form-control account_payment_receive_status">
                    </div>

            </div>
            <div class="modal-footer modal-footer-uniform d-flex justify-content-between">
                <input type="submit" name="update" class="btn btn-sm btn-primary" value="UPDATE">
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- /.modal -->

@endsection
