<div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
    <label for="item_id" class="control-label">{{ 'Item Id' }}</label>
    <input class="form-control" name="item_id" type="number" id="item_id" value="{{ isset($moneytransaction->item_id) ? $moneytransaction->item_id : ''}}" >
    {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total_clearance') ? 'has-error' : ''}}">
    <label for="total_clearance" class="control-label">{{ 'Total Clearance' }}</label>
    <input class="form-control" name="total_clearance" type="number" id="total_clearance" value="{{ isset($moneytransaction->total_clearance) ? $moneytransaction->total_clearance : ''}}" >
    {!! $errors->first('total_clearance', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('value_with_offer') ? 'has-error' : ''}}">
    <label for="value_with_offer" class="control-label">{{ 'Value With Offer' }}</label>
    <input class="form-control" name="value_with_offer" type="number" id="value_with_offer" value="{{ isset($moneytransaction->value_with_offer) ? $moneytransaction->value_with_offer : ''}}" >
    {!! $errors->first('value_with_offer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total_cost') ? 'has-error' : ''}}">
    <label for="total_cost" class="control-label">{{ 'Total Cost' }}</label>
    <input class="form-control" name="total_cost" type="number" id="total_cost" value="{{ isset($moneytransaction->total_cost) ? $moneytransaction->total_cost : ''}}" >
    {!! $errors->first('total_cost', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rs_value') ? 'has-error' : ''}}">
    <label for="rs_value" class="control-label">{{ 'Rs Value' }}</label>
    <input class="form-control" name="rs_value" type="number" id="rs_value" value="{{ isset($moneytransaction->rs_value) ? $moneytransaction->rs_value : ''}}" >
    {!! $errors->first('rs_value', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_cost') ? 'has-error' : ''}}">
    <label for="product_cost" class="control-label">{{ 'Product Cost' }}</label>
    <input class="form-control" name="product_cost" type="number" id="product_cost" value="{{ isset($moneytransaction->product_cost) ? $moneytransaction->product_cost : ''}}" >
    {!! $errors->first('product_cost', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total_product_cost') ? 'has-error' : ''}}">
    <label for="total_product_cost" class="control-label">{{ 'Total Product Cost' }}</label>
    <input class="form-control" name="total_product_cost" type="number" id="total_product_cost" value="{{ isset($moneytransaction->total_product_cost) ? $moneytransaction->total_product_cost : ''}}" >
    {!! $errors->first('total_product_cost', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
