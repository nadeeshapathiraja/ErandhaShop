<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="control-label">{{ 'Order Id' }}</label>
    <input class="form-control" name="order_id" type="number" id="order_id" value="{{ isset($paymenttype->order_id) ? $paymenttype->order_id : ''}}" >
    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Customer Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($paymenttype->name) ? $paymenttype->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
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
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ 'Amount' }}</label>
    <input class="form-control" name="amount" type="number" id="amount" value="{{ isset($paymenttype->amount) ? $paymenttype->amount : ''}}" >
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode === 'edit')
    <div class="form-group {{ $errors->has('pay_to_future') ? 'has-error' : ''}}">
        <label for="amount" class="control-label">{{ 'Pay For Future' }}</label>
        <input class="form-control" name="pay_to_future" type="number" id="pay_to_future" value="{{ isset($paymenttype->pay_to_future) ? $paymenttype->pay_to_future : ''}}" >
        {!! $errors->first('pay_to_future', '<p class="help-block">:message</p>') !!}
    </div>
@endif

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
