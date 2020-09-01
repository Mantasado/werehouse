@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">{{ __('Image') }}</th>
                <th scope="col">{{ __('Name') }}</th>
                <th scope="col">{{ __('EAN') }}</th>
                <th scope="col">{{ __('Type') }}</th>
                <th scope="col">{{ __('Color') }}</th>
                <th scope="col">{{ __('Functions') }}</th>
            </tr>
        </thead>
        <tbody>
            @if(count($products) > 0)
                @foreach($products as $product)
                    <tr>
                        <td><img src="{{ $product->image }}" alt="no image"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->ean }}</td>
                        <td>{{ $product->productType->name }}</td>
                        <td>{{ $product->color }}</td>
                        <td><a href="#" class="btn btn-secondary mr-1">{{ __('Edit') }}</a><a href="#" class="btn btn-danger">{{ __('Delete') }}</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>{{ __('No records found') }}</td>
                </tr>
            @endif
        </tbody>
      </table>
      {{ $products->links() }}
@endsection
