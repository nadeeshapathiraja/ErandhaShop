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
                        <h3>Admin Dashboard</h3>
                    </div>

                    <br/><br/><br/>

                    <div class="row">

                        <div class="col-sm-4">
                            <div class="well">
                                <h4>Item Count</h4>
                                <div class="alert alert-success">
                                    No of Items: {{ $ic }}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="well">
                                <h4>Order Count</h4>
                                <div class="alert alert-primary">
                                    No of Orders: {{ $oc }}
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-sm-4">
                            <div class="well">
                                <h4>Rejection Count</h4>
                                <div class="alert alert-danger">
                                    rejected Orders: {{ $rc }}
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
