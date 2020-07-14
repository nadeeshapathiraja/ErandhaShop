@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">SupplyerCost {{ $supplyercost->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/supplyer-cost') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/supplyer-cost/' . $supplyercost->id . '/edit') }}" title="Edit SupplyerCost"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('supplyercost' . '/' . $supplyercost->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete SupplyerCost" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $supplyercost->id }}</td>
                                    </tr>
                                    <tr><th> Supplyer Id </th><td> {{ $supplyercost->supplyer_id }} </td></tr><tr><th> Name </th><td> {{ $supplyercost->name }} </td></tr><tr><th> Order Id </th><td> {{ $supplyercost->order_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
