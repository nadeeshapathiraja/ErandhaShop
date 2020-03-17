<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($item->photo) ? $item->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category Id' }}</label>
    <select class="form-control" name="category_id" id="category_id" value="{{ isset($item->category_id) ? $item->category_id : ''}}">
        @foreach ($allcategorys as $category)
            @if($formMode === 'edit')
                <option value="{{ $category->id }}" {{ ( $category->id == $item->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
            @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
        @endforeach
    </select>

    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('product_code') ? 'has-error' : ''}}">
    <label for="product_code" class="control-label">{{ 'Product Code' }}</label>
    <input class="form-control" name="product_code" type="text" id="product_code" value="{{ isset($item->product_code) ? $item->product_code : ''}}" >
    {!! $errors->first('product_code', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($item->description) ? $item->description : ''}}" >
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($item->quantity) ? $item->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('dolour_rate') ? 'has-error' : ''}}">
    <label for="dolour_rate" class="control-label">{{ 'Dolour Rate' }}</label>
    <input class="form-control" name="dolour_rate" type="number" id="dolour_rate" value="{{ isset($item->dolour_rate) ? $item->dolour_rate : ''}}" >
    {!! $errors->first('dolour_rate', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('product_cost') ? 'has-error' : ''}}">
    <label for="product_cost" class="control-label">{{ 'Product Cost' }}</label>
    <input class="form-control" name="product_cost" type="number" id="product_cost" value="{{ isset($item->product_cost) ? $item->product_cost : ''}}" >
    {!! $errors->first('product_cost', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount' }}</label>
    <input class="form-control" name="discount" type="number" id="discount" value="{{ isset($item->discount) ? $item->discount : ''}}" >
    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('tax') ? 'has-error' : ''}}">
    <label for="tax" class="control-label">{{ 'Tax' }}</label>
    <input class="form-control" name="tax" type="number" id="tax" value="{{ isset($item->tax) ? $item->tax : ''}}" >
    {!! $errors->first('tax', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('clearance_charge') ? 'has-error' : ''}}">
    <label for="clearance_charge" class="control-label">{{ 'Clearance Charge' }}</label>
    <input class="form-control" name="clearance_charge" type="number" id="clearance_charge" value="{{ isset($item->clearance_charge) ? $item->clearance_charge : ''}}" >
    {!! $errors->first('clearance_charge', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('slmarket_price') ? 'has-error' : ''}}">
    <label for="slmarket_price" class="control-label">{{ 'Slmarket Price' }}</label>
    <input class="form-control" name="slmarket_price" type="number" id="slmarket_price" value="{{ isset($item->slmarket_price) ? $item->slmarket_price : ''}}" >
    {!! $errors->first('slmarket_price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('selling_price') ? 'has-error' : ''}}">
    <label for="selling_price" class="control-label">{{ 'Selling Price' }}</label>
    <input class="form-control" name="selling_price" type="number" id="selling_price" value="{{ isset($item->selling_price) ? $item->selling_price : ''}}" >
    {!! $errors->first('selling_price', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
