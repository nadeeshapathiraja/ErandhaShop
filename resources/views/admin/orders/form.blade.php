<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Order Date' }}</label>
    <input class="form-control" name="date" type="date" id="today" min="" value="{{ isset($order->date) ? $order->date : ''}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('month') ? 'has-error' : ''}}">
    <label for="month" class="control-label">{{ 'Month' }}</label>
    <select class="form-control"  name="month" id="month" value="{{ isset($order->month) ? $order->month : ''}}">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
    {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('deliverycompany_id') ? 'has-error' : ''}}">
    <label for="deliverycompany_id" class="control-label">{{ 'Deliverycompany Name' }}</label>
    <select class="form-control" name="deliverycompany_id" id="deliverycompany_id" value="{{ isset($order->deliverycompany_id) ? $order->deliverycompany_id : ''}}">
        @foreach ($deliverycompanys as $deliverycompany)
            @if($formMode === 'edit')
                <option value="{{ $deliverycompany->id }}" {{ ( $deliverycompany->id == $order->deliverycompany_id) ? 'selected' : '' }}>{{ $deliverycompany->name }}</option>
            @else
                <option value="{{ $deliverycompany->id }}">{{ $deliverycompany->name }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('deliverycompany_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('shipment_code') ? 'has-error' : ''}}">
    <label for="shipment_code" class="control-label">{{ 'Deliverycompany Shipment Code' }}</label>
    <input class="form-control" name="shipment_code" type="text" id="shipment_code" value="{{ isset($order->shipment_code) ? $order->shipment_code : ''}}" >
    {!! $errors->first('shipment_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Customer Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($order->name) ? $order->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order_source') ? 'has-error' : ''}}">
    <label for="order_source" class="control-label">{{ 'Order Source' }}</label>
    <select class="form-control" name="order_source" id="order_source" value="{{ isset($order->order_source) ? $order->order_source : ''}}">
        @if($formMode === 'edit')
            <option value="{{ $order->order_source }}" {{ ( $order->order_source == $order->order_source) ? 'selected' : '' }}>{{ $order->order_source }}</option>
        @else
            <option value="Instagram">Instagram</option>
            <option value="Facebook">Facebook</option>
            <option value="Personal">Personal</option>
        @endif

    </select>
    {!! $errors->first('order_source', '<p class="help-block">:message</p>') !!}
</div>

{{--  shopping cart  --}}
<div class="row">
    <div class="card" style="width: 100%">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                        <label for="item_id" class="control-label">{{ 'Catergory Name' }}</label>s
                        <select class="form-control dynamic input-lg" name="category_id" id="category_id" data-dependent="item" value="{{ isset($order->category_id) ? $order->category_id : ''}}">
                            <option value="">Select Category</option>
                            @foreach ($categorys as $category)
                                @if($formMode === 'edit')
                                    <option value="{{ $category->id }}" {{ ( $category->id == $order->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <br/>
                        <div id="Result">

                        </div>

                        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
                        <label for="item_id" class="control-label">{{ 'Item Name' }}</label>
                        <select class="form-control abcd input-lg" name="item_id" id="item_id" value="{{ isset($order->item_id) ? $order->item_id : ''}}">
                            <option value="">Select Item</option>
                        </select>
                        <br/>
                        <div id="Result">

                        </div>

                        {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}

                    </div>
                </div>
                {{ csrf_field() }}
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
                        <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
                        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($order->quantity) ? $order->quantity : ''}}" >
                        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('unit_price') ? 'has-error' : ''}}">
                        <label for="unit_price" class="control-label">{{ 'Selling Price For Unit' }}</label>
                        <input class="form-control" name="unit_price" type="number" id="unit_price" readonly>
                        {!! $errors->first('unit_price', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <label for="action" class="control-label">{{ 'Action' }}</label>
                    <input type="button" class="form-control" id="button1" value="Add" onclick="add_element_to_array(); display_array(); getMessage();"></input>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="itemTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="itemTableBody">

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                        <label for="Location_address" class="control-label">{{ 'Total Price ' }}</label>
                        <input class="form-control" name="price" type="text" id="price" value="{{ isset($order->price) ? $order->price : ''}}" readonly>
                        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>


        </div>
      </div>
</div>



<div class="form-group {{ $errors->has('Location_address') ? 'has-error' : ''}}">
    <label for="Location_address" class="control-label">{{ 'Location Address' }}</label>
    <input class="form-control" name="Location_address" type="text" id="Location_address" value="{{ isset($order->Location_address) ? $order->Location_address : ''}}" >
    {!! $errors->first('Location_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('zone_id') ? 'has-error' : ''}}">
    <label for="city_id" class="control-label">{{ 'Zone Name' }}</label>
    <select class="form-control" name="zone_id" id="zone_id" value="{{ isset($order->zone_id) ? $order->zone_id : ''}}">
        @foreach ($zones as $zone)
            @if($formMode === 'edit')
                <option value="{{ $zone->id }}" {{ ( $zone->id == $item->zone_id) ? 'selected' : '' }}>{{ $zone->name }}</option>
            @else
                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="control-label">{{ 'Telephone' }}</label>
    <input class="form-control" name="telephone" type="text" id="telephone" value="{{ isset($order->telephone) ? $order->telephone : ''}}" >
    {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
    <label for="notes" class="control-label">{{ 'Notes' }}</label>
    <input class="form-control" name="notes" type="text" id="notes" value="{{ isset($order->notes) ? $order->notes : ''}}" >
    {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('deposit_type') ? 'has-error' : ''}}">
            <label for="deposit_type" class="control-label">{{ 'Payment  Type' }}</label>
            <select class="form-control" name="deposit_type" id="deposit_type" value="{{ isset($paymenttype->deposit_type) ? $paymenttype->deposit_type : ''}}">
                <option value="Bank Deposit">Bank Deposit</option>
                <option value="Cash On Delivery">Cash On Delivery</option>
                <option value="Pick Up">Pick Up</option>
                <option value="Pre Order">Pre Order</option>
            </select>
            {!! $errors->first('deposit_type', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('first_payment') ? 'has-error' : ''}}">
            <label for="first_payment" class="control-label">{{ 'First Payment' }}</label>
            <input class="form-control" name="first_payment" type="number" id="first_payment" value="{{ isset($order->first_payment) ? $order->first_payment : ''}}" >
            {!! $errors->first('first_payment', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('delivery_process') ? 'has-error' : ''}}">
    <label for="delivery_process" class="control-label">{{ 'Delivery Process' }}</label>
    <select class="form-control" name="delivery_process" id="delivery_process" value="{{ isset($order->delivery_process) ? $order->delivery_process : ''}}">
        @if($formMode === 'edit')
            <option value="{{ $order->delivery_process }}" ? 'selected' : '' }}>{{ $order->delivery_process }}</option>
            <option value="Pickup">Pickup</option>
            <option value="Onprocess">Onprocess</option>
            <option value="Dispatch">Dispatch</option>
            <option value="Deliverd">Deliverd</option>
            <option value="Return">Return</option>
            <option value="Reject">Reject</option>
        @else
            <option value="Pickup">Pickup</option>
            <option value="Onprocess">Onprocess</option>
            <option value="Dispatch">Dispatch</option>
            <option value="Deliverd">Deliverd</option>
            <option value="Return">Return</option>
            <option value="Reject">Reject</option>
        @endif

    </select>

    {!! $errors->first('delivery_process', '<p class="help-block">:message</p>') !!}
</div>
<br/>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <input type="button" class="btn btn-danger" name="cancel" value="Cancel" onClick="window.location='../orders';" />
</div>

<br/>


