@extends('layouts.app')

@section('content')
<div class="mb-1">
<a href="/" class="btn btn-secondary">{{ __('products.back_to_list') }}</a>
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
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->ean }}</td>
                        <td>{{ __('products.' .$product->productType->name) }}</td>
                        <td>{{ $product->color }}</td>
                        <td>
                            <form class="d-inline-block" action="{{ route('restore.product', $product->id) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <button class="btn btn-primary">{{ __('products.restore') }}</button>
                            </form>
                            <form class="d-inline-block" action="{{ route('remove.product', $product->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">{{ __('products.delete') }}</button>
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

@endsection
