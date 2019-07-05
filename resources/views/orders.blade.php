@extends('layouts.master')


@section('content')

    <div class="accordion" id="accordionExample">

        @foreach($orders as $order)
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $order->id }}" aria-expanded="false" aria-controls="collapse{{ $order->id }}">
                        Order ID #{{ $order->id }}, Total price = {{ $order->total }} $.
                    </button>
                </h2>
            </div>

            <div id="collapse{{ $order->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        @endforeach

    </div>
{{--
    <div class="col-lg-8">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Total price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product['id'] }}</th>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['qt'] }}</td>
                    <td>{{ $product['price'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h4>Total price: {{ $total }}</h4>

        <div>
            <a class="btn btn-info" href="{{ url('/basket/checkout') }}">Checkout</a>
        </div>
    </div>--}}

@endsection
