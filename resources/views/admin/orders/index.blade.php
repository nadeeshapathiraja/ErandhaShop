@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <a href="{{ url('/orders/create') }}" class="btn btn-success btn-sm" title="Add New Order">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Delivery Process</th>
                                        {{--  <th>Item</th>  --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if($item->delivery_process === 'Pickup')
                                                <button style="width: 150px" class="btn btn-secondary">PickUp Order</button>
                                            @elseif($item->delivery_process === 'Onprocess')
                                                <button style="width: 150px" class="btn btn-info">OnProcess Order</button>
                                            @elseif($item->delivery_process === 'Dispatch')
                                                <button style="width: 150px" class="btn btn-primary">Dispatch Item</button>
                                            @elseif($item->delivery_process === 'Deliverd')
                                                <button style="width: 150px" class="btn btn-success">Deliverd Item</button>
                                            @elseif($item->delivery_process === 'Reject')
                                                <button style="width: 150px" class="btn btn-light">Rejected Item</button>
                                            @else
                                                <button style="width: 150px" class="btn btn-danger">Return Item</button>
                                            @endif
                                        </td>
                                        {{--  <td>{{ $item->item->name}}</td>  --}}
                                        <td>
                                            <a href="{{ url('/orders/' . $item->id) }}" title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/orders/' . $item->id . '/edit') }}" title="Edit Order"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/orders' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
