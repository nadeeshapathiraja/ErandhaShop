<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($city->name) ? $city->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('deliverycompany_id') ? 'has-error' : ''}}">
    <label for="deliverycompany_id" class="control-label">{{ 'Deliverycompany Id' }}</label>
    <select class="form-control" name="deliverycompany_id" id="deliverycompany_id" value="{{ isset($item->deliverycompany_id) ? $item->deliverycompany_id : ''}}">
        @foreach ($deliverycompanys as $deliverycompany)
            @if($formMode === 'edit')
                <option value="{{ $deliverycompany->id }}" {{ ( $deliverycompany->id == $item->deliverycompany_id) ? 'selected' : '' }}>{{ $deliverycompany->name }}</option>
            @else
                <option value="{{ $deliverycompany->id }}">{{ $deliverycompany->name }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('deliverycompany_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('zone_id') ? 'has-error' : ''}}">
    <label for="zone_id" class="control-label">{{ 'Zone Id' }}</label>
    <select class="form-control" name="zone_id" id="zone_id" value="{{ isset($item->zone_id) ? $item->zone_id : ''}}">
        @foreach ($zones as $zone)
            @if($formMode === 'edit')
                <option value="{{ $zone->id }}" {{ ( $zone->id == $item->zone_id) ? 'selected' : '' }}>{{ $zone->name }}</option>
            @else
                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
            @endif
        @endforeach
    </select>
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
