@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    
                    <div class="card-header">Order {{ $order->id }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <a href="{{ url('/orders') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <a href="{{ url('/orders/' . $order->id . '/edit') }}" title="Edit Order"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/orders' . '/' . $order->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                @if($order->delivery_process === 'Pickup')
                                    <button style="width: 150px" class="btn btn-secondary">PickUp Order</button>
                                @elseif($order->delivery_process === 'Onprocess')
                                    <button style="width: 150px" class="btn btn-info">OnProcess Order</button>
                                @elseif($order->delivery_process === 'Dispatch')
                                    <button style="width: 150px" class="btn btn-primary">Dispatch Item</button>
                                @elseif($order->delivery_process === 'Deliverd')
                                    <button style="width: 150px" class="btn btn-success">Deliverd Item</button>
                                @else
                                    <button style="width: 150px" class="btn btn-danger">Return Item</button>
                                @endif
                            </div>
                        </div>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    <tr>
                                        <th>Order Date </th>
                                        <td> {{ $order->date }} </td>
                                    </tr>
                                    <tr>
                                        <th> Customer Name </th>
                                        <td> {{ $order->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Delivery Company Code </th>
                                        <td> {{ $order->shipment_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> Delivery Company </th>
                                        <td> {{ $order->deliverycompany_id }} </td>
                                    </tr>

                                    <tr>
                                        <th> Item Quantity </th>
                                        <td> {{ $order->quantity }} </td>
                                    </tr>
                                    <tr>
                                        <th> Items </th>
                                        @foreach ($cartItems as $item)
                                            <p>{{ $item->item_name }} --> {{ $item->quantity }}</p>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <th> Delivery Address </th>
                                        <td> {{ $order->Location_address }} </td>
                                    </tr>
                                    <tr>
                                        <th> Price </th>
                                        <td> {{ $order->price }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
