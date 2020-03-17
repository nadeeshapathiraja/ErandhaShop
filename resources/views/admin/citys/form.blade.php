<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($city->name) ? $city->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('deliverycompany_id') ? 'has-error' : ''}}">
    <label for="deliverycompany_id" class="control-label">{{ 'Deliverycompany Id' }}</label>
    <input class="form-control" name="deliverycompany_id" type="number" id="deliverycompany_id" value="{{ isset($city->deliverycompany_id) ? $city->deliverycompany_id : ''}}" >
    {!! $errors->first('deliverycompany_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('zone_id') ? 'has-error' : ''}}">
    <label for="zone_id" class="control-label">{{ 'Zone Id' }}</label>
    <input class="form-control" name="zone_id" type="number" id="zone_id" value="{{ isset($city->zone_id) ? $city->zone_id : ''}}" >
    {!! $errors->first('zone_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('postal_code') ? 'has-error' : ''}}">
    <label for="postal_code" class="control-label">{{ 'Postal Code' }}</label>
    <input class="form-control" name="postal_code" type="number" id="postal_code" value="{{ isset($city->postal_code) ? $city->postal_code : ''}}" >
    {!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($city->price) ? $city->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
