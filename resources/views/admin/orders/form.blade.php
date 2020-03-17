<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($order->date) ? $order->date : ''}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="control-label">{{ 'Order Id' }}</label>
    <input class="form-control" name="order_id" type="number" id="order_id" value="{{ isset($order->order_id) ? $order->order_id : ''}}" >
    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('deliverycompany_id') ? 'has-error' : ''}}">
    <label for="deliverycompany_id" class="control-label">{{ 'Deliverycompany Id' }}</label>
    <input class="form-control" name="deliverycompany_id" type="number" id="deliverycompany_id" value="{{ isset($order->deliverycompany_id) ? $order->deliverycompany_id : ''}}" >
    {!! $errors->first('deliverycompany_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('shipment_code') ? 'has-error' : ''}}">
    <label for="shipment_code" class="control-label">{{ 'Shipment Code' }}</label>
    <input class="form-control" name="shipment_code" type="text" id="shipment_code" value="{{ isset($order->shipment_code) ? $order->shipment_code : ''}}" >
    {!! $errors->first('shipment_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($order->name) ? $order->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order_source') ? 'has-error' : ''}}">
    <label for="order_source" class="control-label">{{ 'Order Source' }}</label>
    <input class="form-control" name="order_source" type="text" id="order_source" value="{{ isset($order->order_source) ? $order->order_source : ''}}" >
    {!! $errors->first('order_source', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
    <label for="item_id" class="control-label">{{ 'Item Id' }}</label>
    <input class="form-control" name="item_id" type="number" id="item_id" value="{{ isset($order->item_id) ? $order->item_id : ''}}" >
    {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($order->quantity) ? $order->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($order->price) ? $order->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Location_address') ? 'has-error' : ''}}">
    <label for="Location_address" class="control-label">{{ 'Location Address' }}</label>
    <input class="form-control" name="Location_address" type="text" id="Location_address" value="{{ isset($order->Location_address) ? $order->Location_address : ''}}" >
    {!! $errors->first('Location_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
    <label for="city_id" class="control-label">{{ 'City Id' }}</label>
    <input class="form-control" name="city_id" type="number" id="city_id" value="{{ isset($order->city_id) ? $order->city_id : ''}}" >
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
    <input class="form-control" name="delivery_process" type="text" id="delivery_process" value="{{ isset($order->delivery_process) ? $order->delivery_process : ''}}" >
    {!! $errors->first('delivery_process', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
