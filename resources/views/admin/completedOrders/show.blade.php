@extends('admin.layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.OrderDetails')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('completedOrders.index') }}" class="btn btn-warning">@lang('words.Back')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{$completedOrder->name}}</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <tr>
                                <th>@lang('words.PhoneNumber'):</th>
                                <td>{{ $completedOrder->telephone }}</td>
                            </tr>
                            <tr>
                                <th>@lang('words.Address'):</th>
                                <td>{{ $completedOrder->address }}</td>
                            </tr>
                            <tr>
                                <th>@lang('words.CreatedAt'):</th>
                                <td>{{ $completedOrder->created_at }}</td>
                            </tr>
                            <tr>
                                <th>@lang('words.UpdatedAt'):</th>
                                <td>{{ $completedOrder->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>@lang('words.ProductName')</th>
                                    <th>@lang('words.Quantity')</th>
                                    <th>@lang('words.Price')</th>
                                    <th>@lang('words.ProductsPrice')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $products = json_decode($completedOrder->products, true);
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['quantity'] }}</td>
                                        <td>{{ $product['price'] }} @lang('words.sum')</td>
                                        <td>{{ $product['quantity'] * $product['price'] }} @lang('words.sum')</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">@lang('words.TotalPrice'): {{ $completedOrder->total_price }} @lang('words.sum')</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
