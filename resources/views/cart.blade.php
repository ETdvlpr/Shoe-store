@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

<div class="row justify-content-center">
    <div class="col-lg-7">
        <br>
        @if(\Cart::getTotalQuantity()>0)
        <h4>{{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</h4><br>
        @else
        <h4>No Product(s) In Your Cart</h4><br>
        <a href="/" class="btn btn-dark">Continue Shopping</a>
        @endif

        @foreach($cartCollection as $shoe)
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ asset($shoe->attributes->image) }}" class="img-thumbnail" width="200" height="200">
            </div>
            <div class="col-lg-5">
                <p>
                    <b>{{ $shoe->name }}</b><br>
                    <b>Price: </b>{{ number_format($shoe->price) }} {{$shoe->attributes->currency}}<br>
                    <b>Sub Total: </b>{{ number_format(\Cart::get($shoe->id)->getPriceSum()) }}<br>
                </p>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <form action="{{ route('cart.update') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <input type="hidden" value="{{ $shoe->id}}" id="id" name="id">
                            <input type="number" class="form-control form-control-sm" value="{{ $shoe->quantity }}"
                            id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                            <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i class="fa fa-edit"></i></button>
                        </div>
                    </form>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $shoe->id }}" id="id" name="id">
                        <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        @endforeach
        @if(count($cartCollection)>0)
        <form action="{{ route('cart.clear') }}" method="POST">
            {{ csrf_field() }}
            <button class="btn btn-secondary btn-md">Clear Cart</button>
        </form>
        @endif
    </div>
    @if(count($cartCollection)>0)
    <div class="col-lg-5">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Total: </b>{{ number_format(\Cart::getTotal()) }}</li>
            </ul>
        </div>
        <br><a href="/shop" class="btn btn-dark">Continue Shopping</a>
        <a href="/checkout" class="btn btn-success">Proceed To Checkout</a>
    </div>
    @endif
</div>
@endsection