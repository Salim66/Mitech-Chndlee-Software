@extends('master')

@section('admin')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Create Agent
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Agents </li>
                        <li class="breadcrumb-item active">Create Agent </li>
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
                        <h5> Add Account</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <form class="needs-validation account-add" novalidate="" action="{{ route('store.account') }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Select Agent</label>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="form-control digits select2" id="exampleFormControlSelect1" name="agent_id">
                                                <option disabled selected>--Select--</option>
                                                @foreach($agents as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
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
                                            <input class="form-control" name="amount" id="validationCustom0" type="number" required="">
                                        </div>
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Purpose</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="purpose" id="validationCustom2" type="text" required="">
                                        </div>
                                        @error('purpose')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Payment Receive Status</label>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" name="payment_receive_status" id="validationCustom2" type="text" required="">
                                        </div>
                                        @error('payment_receive_status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

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
