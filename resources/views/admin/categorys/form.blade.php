<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($category->name) ? $category->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('item_code') ? 'has-error' : ''}}">
    <label for="item_code" class="control-label">{{ 'Item Code' }}</label>
    <input class="form-control" name="item_code" type="text" id="item_code" value="{{ isset($category->item_code) ? $category->item_code : ''}}" >
    {!! $errors->first('item_code', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
