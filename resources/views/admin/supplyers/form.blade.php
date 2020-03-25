<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($supplyer->name) ? $supplyer->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    <label for="country" class="control-label">{{ 'Country' }}</label>
    <input class="form-control" name="country" type="text" id="country" value="{{ isset($supplyer->country) ? $supplyer->country : ''}}" >
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
            <label for="item_id" class="control-label">{{ 'Catergory Name' }}</label>s
            <select class="form-control" name="category_id" id="category_id" value="{{ isset($supplyer->category_id) ? $supplyer->category_id : ''}}">
                @foreach ($categorys as $category)
                    @if($formMode === 'edit')
                        <option value="{{ $category->id }}" {{ ( $category->id == $supplyer->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
            <br/>
            <div id="Result">
            </div>
            {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
            <label for="item_id" class="control-label">{{ 'Item Id' }}</label>
            <select class="form-control" name="item_id" id="item_id" value="{{ isset($supplyer->item_id) ? $supplyer->item_id : ''}}">
                @foreach ($items as $item)
                    @if($formMode === 'edit')
                        <option value="{{ $item->id }}" {{ ( $item->id == $item->item_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($supplyer->quantity) ? $supplyer->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
