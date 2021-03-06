<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Company Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($deliverycompany->name) ? $deliverycompany->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('zone') ? 'has-error' : ''}}">
    <label for="zone" class="control-label">{{ 'Area Name' }}</label>
    <select class="form-control" name="zone" id="zone" value="{{ isset($deliverycompany->zone) ? $deliverycompany->zone : ''}}">
        @foreach ($zones as $zone)
            @if($formMode === 'edit')
                <option value="{{ $zone->id }}" {{ ( $zone->id == $city->zone_id) ? 'selected' : '' }}>{{ $zone->name }}</option>
            @else
                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('zone', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Zone Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($deliverycompany->price) ? $deliverycompany->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('maxweight') ? 'has-error' : ''}}">
    <label for="maxweight" class="control-label">{{ 'Max Weight' }}</label>
    <input class="form-control" name="maxweight" type="number" id="maxweight" value="{{ isset($deliverycompany->maxweight) ? $deliverycompany->maxweight : ''}}" >
    {!! $errors->first('maxweigh', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('additional') ? 'has-error' : ''}}">
    <label for="additional" class="control-label">{{ 'Price For Additional 1Kg' }}</label>
    <input class="form-control" name="additional" type="number" id="additional" value="{{ isset($deliverycompany->additional) ? $deliverycompany->additional : ''}}" >
    {!! $errors->first('additional', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('cod_less') ? 'has-error' : ''}}">
    <label for="cod_less" class="control-label">{{ 'COD less than Limit' }}</label>
    <input class="form-control" name="cod_less" type="number" id="cod_less" value="{{ isset($deliverycompany->cod_less) ? $deliverycompany->cod_less : ''}}" >
    {!! $errors->first('cod_less', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('cod_above') ? 'has-error' : ''}}">
    <label for="cod_above" class="control-label">{{ 'COD above than Limit' }}</label>
    <input class="form-control" name="cod_above" type="number" id="cod_above" value="{{ isset($deliverycompany->cod_above) ? $deliverycompany->cod_above : ''}}" >
    {!! $errors->first('cod_above', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
