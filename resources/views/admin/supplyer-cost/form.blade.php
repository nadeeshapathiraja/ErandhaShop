<div class="form-group {{ $errors->has('supplyer_id') ? 'has-error' : ''}}">
    <label for="supplyer_id" class="control-label">{{ 'Supplyer Id' }}</label>
    <input class="form-control" name="supplyer_id" type="number" id="supplyer_id" value="{{ isset($supplyercost->supplyer_id) ? $supplyercost->supplyer_id : ''}}" >
    {!! $errors->first('supplyer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($supplyercost->name) ? $supplyercost->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="control-label">{{ 'Order Id' }}</label>
    <input class="form-control" name="order_id" type="number" id="order_id" value="{{ isset($supplyercost->order_id) ? $supplyercost->order_id : ''}}" >
    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($supplyercost->price) ? $supplyercost->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
