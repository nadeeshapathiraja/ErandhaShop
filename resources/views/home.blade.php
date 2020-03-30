@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.sidebar')
        <div class="col-md-9">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="well">
                        <h2 style="text-align: center">Admin Dashboard</h2>
                    </div>

                    <br/><br/>

                    <div class="row">
                            <div class="col-sm-3">
                                <div class="well">
                                    <h4>Item Count</h4>
                                    <div class="alert alert-info">
                                        No of Items: {{ $ic }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="well">
                                    <h4>Order Count</h4>
                                    <div class="alert alert-info">
                                        No of Orders: {{ $oc }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="well">
                                    <h4>PickUp Orders</h4>
                                    <div class="alert alert-info">
                                        PickUp: {{ $Pickup }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="well">
                                    <h4>Rejected Orders</h4>
                                    <div class="alert alert-info">
                                        Rejected: {{ $Reject }}
                                    </div>
                                </div>
                            </div>

                    </div><br/><br/>
                    <div>
                        <h2 style="text-align: center">Order Process</h2><br/>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="well">
                                    <h4>OnProcess Orders</h4>
                                    <div class="alert alert-primary">
                                        OnProcess Orders: {{ $Onprocess }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="well">
                                    <h4>Dispatch Orders</h4>
                                    <div class="alert alert-warning">
                                        Dispatch Orders: {{ $Dispatch }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="well">
                                    <h4>Deliverd Orders</h4>
                                    <div class="alert alert-success">
                                        Deliverd: {{ $Deliverd }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="well">
                                    <h4>Return Orders</h4>
                                    <div class="alert alert-danger">
                                        Returns: {{ $Return }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
