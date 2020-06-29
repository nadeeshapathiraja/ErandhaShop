@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ Session::get('flash_message') }} </strong>
                    </div>
                    {{ Session::forget('flash_message') }}
                @endif
                <div class="card">
                    <div class="card-header">Orders</div>
                    <div class="card-body">


                        <form method="GET" action="{{ url('/orders') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>

                        {{--  Select all button  --}}
                        <input type="checkbox" id='checkall' onClick="selectall(this)"/>Select All<br/><br/>

                        <div class="table-responsive">
                            <form action="{{ url('selected') }}" method="POST" id="printForm">
                                <table class="table table-bordered table-striped table-dark table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Select</th>
                                            <th>Order Id</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>Telephone Number</th>
                                        </tr>
                                    </thead>
                                    @csrf
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><input type="checkbox" class='checkbox' name="selectdata[]" value="{{ $order->id }}"></td>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->Location_address }}</td>
                                            <td>{{ $order->telephone }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <input type="submit" name="submit" value="Print Selected" class="btn btn-success btn-sm"/>

                                <a href="{{ url('printAll') }}" style="margin-left: 500px"class="btn btn-success btn-sm">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Print All
                                </a><br/><br/>
                            </form>



                            <div class="pagination-wrapper"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() { //Inicio
            var myTable = $('#myTable').DataTable();

        } )
    </script>
@endsection
