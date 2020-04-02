<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($payment->date) ? $payment->date : ''}}" >
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="control-label">{{ 'Order Id' }}</label>
    <input class="form-control" name="order_id" type="number" id="order_id" value="{{ isset($payment->order_id) ? $payment->order_id : ''}}" >
    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($payment->name) ? $payment->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Paymenttypes') ? 'has-error' : ''}}">
    <label for="Paymenttypes" class="control-label">{{ 'Payment Type' }}</label>
    <select class="form-control" name="Paymenttypes" id="Paymenttypes" value="{{ isset($payment->Paymenttypes) ? $payment->Paymenttypes : ''}}" >
        <option value="Bank Deposit">Bank Deposit</option>
        <option value="Cash On Delivery">Cash On Delivery</option>
        <option value="Pick Up">Pick Up</option>
        <option value="Pre Order">Pre Order</option>
    </select>
    {!! $errors->first('Paymenttypes', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('payment') ? 'has-error' : ''}}">
    <label for="payment" class="control-label">{{ 'Payment' }}</label>
    <input class="form-control" name="payment" type="number" id="payment" value="{{ isset($payment->payment) ? $payment->payment : ''}}" >
    {!! $errors->first('payment', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
