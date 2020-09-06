@extends('layouts.app')

@section('content')
<div class="mb-1">
<a href="/create" class="btn btn-primary">{{ __('products.new_product') }}</a>
<a href="/removed" class="btn btn-secondary float-right">{{ __('products.removed_product') }}</a>
</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">{{ __('products.image') }}</th>
                <th scope="col">{{ __('products.name') }}</th>
                <th scope="col">{{ __('products.ean') }}</th>
                <th scope="col">{{ __('products.type') }}</th>
                <th scope="col">{{ __('products.color') }}</th>
                <th scope="col">{{ __('products.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @if(count($products) > 0)
                @foreach($products as $product)
                    <tr>
                        <td><img style="widh: 100px; height: 100px" src="
                            @if($product->image)
                                {{ asset('storage/' . $product->image) }}
                            @else
                                {{ asset('storage/images/no_image.png')}}
                            @endif
                            " alt="{{ $product->name }}"></td>
                        <td><a href="/show/{{ $product->id }}">{{ $product->name }}</a></td>
                        <td>{{ $product->ean }}</td>
                        <td>{{ __('products.' .$product->productType->name) }}</td>
                        <td>{{ $product->color }}</td>
                        <td><a href="/update/{{ $product->id }}/edit" class="btn btn-secondary">{{ __('products.edit') }}</a>
                            <form class="d-inline-block" action="{{ route('destroy.product', $product->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">{{ __('products.remove') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>{{ __('products.no_records_found') }}</td>
                </tr>
            @endif
        </tbody>
      </table>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
@endsection
