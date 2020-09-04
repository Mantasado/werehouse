@extends('layouts.app')

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">{{ __('Quantity') }}</th>
            <th scope="col">{{ __('Price') }}</th>
            <th scope="col">{{ __('Date') }}</th>
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
                <td>{{ __('No records found') }}</td>
            </tr>
        @endif
    </tbody>
    </table>
@endsection
