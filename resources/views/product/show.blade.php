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
<div class="bg-light pt-1 pb-1">
    <form class="form-inline" method="POST" action="{{ route('store.details', $product->id) }}">
        @csrf
        <div class="ml-2 form-group">
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="{{ __('products.quantity') }}">
        </div>
        <div class="ml-2 form-group">
            <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="price" name="price" placeholder="{{ __('products.price') }}">
        </div>
    <button type="submit" class="ml-2 btn btn-primary">{{ __('products.submit') }}</button>
</form>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">{{ __('products.quantity') }}</th>
            <th scope="col">{{ __('products.price') }}</th>
            <th scope="col">{{ __('products.date') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($product->productDetails) > 0)
            @foreach ($product->productDetails as $details)
                <tr>
                    <td>{{ $details->quantity }}</td>
                    <td>{{ $details->price }}</td>
                    <td>{{ $details->created_at }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>{{ __('products.no_records_found') }}</td>
            </tr>
        @endif
    </tbody>
    </table>
@endsection
