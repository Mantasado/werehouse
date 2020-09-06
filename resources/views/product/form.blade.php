@csrf
<div class="form-group">
    <label for="name">{{ __('products.product') }}</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="ean">{{ __('products.ean') }}</label>
    <input type="number" class="form-control" id="ean" name="ean" value="{{ $product->ean ?? old('ean') }}">
</div>
<div class="form-group">
    <label for="product_type_id">{{ __('products.type') }}</label>
    <select class="form-control" id="product_type_id" name="product_type_id">
        <option value="">{{ __('products.select_type') }}</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ ($product->product_type_id ?? old('product_type_id')) == $type->id ? "selected" : "" }}>{{ __('products.' .$type->name) }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="color">{{ __('products.color') }}</label>
<input type="text" class="form-control" id="color" name="color" value="{{ $product->color ?? old('color') }}">
</div>
<div class="form-group">
    <label for="image">{{ __('products.image') }}</label>
    <input type="file" class="form-control-file" id="image" name="image">
</div>
