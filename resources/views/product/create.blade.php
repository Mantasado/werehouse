@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-4 bg-light pt-1 pb-1">
    <form method="POST" action="/store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="ean">EAN</label>
            <input type="number" class="form-control" id="ean" name="ean">
        </div>
        <div class="form-group">
            <label for="product_type_id">Type</label>
            <select class="form-control" id="product_type_id" name="product_type_id">
                <option value="">Select type</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" id="color" name="color">
        </div>
        <div class="form-group">
            <label for="image">Product image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection