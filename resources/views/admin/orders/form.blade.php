<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($order->date) ? $order->date : ''}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="control-label">{{ 'Order Id' }}</label>
    <input class="form-control" name="order_id" type="text" id="order_id" value="{{ isset($order->order_id) ? $order->order_id : ''}}" >
    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group {{ $errors->has('deliverycompany_id') ? 'has-error' : ''}}">
    <label for="deliverycompany_id" class="control-label">{{ 'Deliverycompany Id' }}</label>
    <input class="form-control" name="deliverycompany_id" type="text" id="deliverycompany_id" value="{{ isset($order->deliverycompany_id) ? $order->deliverycompany_id : ''}}" >
    {!! $errors->first('deliverycompany_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('shipment_code') ? 'has-error' : ''}}">
    <label for="shipment_code" class="control-label">{{ 'Shipment Code' }}</label>
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
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
            <label for="item_id" class="control-label">{{ 'Item Name' }}</label>
            <select class="form-control" name="item_id" id="item_id" value="{{ isset($order->item_id) ? $order->item_id : ''}}">
                @foreach ($items as $item)
                    @if($formMode === 'edit')
                        <option value="{{ $item->id }}" {{ ( $item->id == $item->item_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
            <br/>
            <div id="Result">

            </div>

            {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
            <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
            <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($order->quantity) ? $order->quantity : ''}}" >
            {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-2">
        <label for="action" class="control-label">{{ 'Action' }}</label>
        <input type="button" class="form-control" id="button1" value="Add" onclick="add_element_to_array(); display_array();"></input>
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($order->price) ? $order->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group {{ $errors->has('Location_address') ? 'has-error' : ''}}">
    <label for="Location_address" class="control-label">{{ 'Location Address' }}</label>
    <input class="form-control" name="Location_address" type="text" id="Location_address" value="{{ isset($order->Location_address) ? $order->Location_address : ''}}" >
    {!! $errors->first('Location_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
    <label for="city_id" class="control-label">{{ 'City Name' }}</label>
    <select class="form-control" name="city_id" id="city_id" value="{{ isset($item->city_id) ? $item->city_id : ''}}">
        @foreach ($citys as $city)
            @if($formMode === 'edit')
                <option value="{{ $city->id }}" {{ ( $city->id == $item->city_id) ? 'selected' : '' }}>{{ $city->name }}</option>
            @else
                <option value="{{ $city->id }}">{{ $city->name }}</option>
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
<div class="form-group {{ $errors->has('delivery_process') ? 'has-error' : ''}}">
    <label for="delivery_process" class="control-label">{{ 'Delivery Process' }}</label>
    <select class="form-control" name="delivery_process" id="delivery_process" value="{{ isset($order->delivery_process) ? $order->delivery_process : ''}}">
        @if($formMode === 'edit')
            <option value="{{ $order->delivery_process }}" ? 'selected' : '' }}>{{ $order->delivery_process }}</option>
        @else
            <option value="Pickup">Pickup</option>
            <option value="Onprocess">Onprocess</option>
            <option value="Dispatch">Dispatch</option>
            <option value="Deliverd">Deliverd</option>
            <option value="Return">Return</option>
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


