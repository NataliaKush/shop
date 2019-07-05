@extends('layouts.master')

@section('content')
        <div class="col-lg-3">
            <h3>{{ $product->name }}</h3>
            <img src="{{ asset('storage/product/' . $product->image) }}" alt="" width="200">
            <div>{{ $product->description }}</div>
            <div><span>{{ $product->price }} $</span> <span>Qt: {{ $product->quantity }}</span></div>
        </div>

        <div class="col-lg-3">
            <h6>Buy {{ $product->name }}</h6>
            <form action="{{ url('/basket/add') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <input type="number" class="form-control" name="quantity">
                <button class="btn btn-info" id="buy-btn">Buy</button>
            </form>
        </div>
@endsection
