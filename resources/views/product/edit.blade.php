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
    <form method="POST" action="{{ route('update.product', $product->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @include('product.form')
    <button type="submit" class="btn btn-primary">{{ __('products.submit') }}</button>
    </form>
@endsection