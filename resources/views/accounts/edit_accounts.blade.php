@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Edit Account
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Accounts </li>
                        <li class="breadcrumb-item active">Edit Account </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @php
        $agents = App\Models\Agent::latest()->get();
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Edit Account</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="account-tab">
                                <form class="needs-validation user-add" novalidate="" action="{{ route('update.account', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Select Agent</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="agent_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($agents as $agent)
                                                <option value="{{ $agent->id }}" {{ ($data->agent_id == $agent->id) ? 'selected' : '' }}>{{ $agent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('agent_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Amount</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="amount" id="validationCustom0" type="number" required="" value="{{ $data->amount }}">
                                        </div>
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Purpose</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="purpose" id="validationCustom2" type="text" required="" value="{{ $data->purpose }}">
                                        </div>
                                        @error('purpose')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Payment Receive Status</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="payment_receive_status" id="validationCustom2" type="text" required="" value="{{ $data->payment_receive_status }}">
                                        </div>
                                        @error('payment_receive_status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection
