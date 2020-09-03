@csrf
<div class="form-group">
    <label for="name">Product</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="ean">EAN</label>
    <input type="number" class="form-control" id="ean" name="ean" value="{{ $product->ean ?? old('ean') }}">
</div>
<div class="form-group">
    <label for="product_type_id">Type</label>
    <select class="form-control" id="product_type_id" name="product_type_id">
        <option value="">Select type</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ ($product->product_type_id ?? old('product_type_id')) == $type->id ? "selected" : "" }}>{{ $type->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="color">Color</label>
<input type="text" class="form-control" id="color" name="color" value="{{ $product->color ?? old('color') }}">
</div>
<div class="form-group">
    <label for="image">Product image</label>
    <input type="file" class="form-control-file" id="image" name="image">
</div>
