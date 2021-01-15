@extends('layouts.app')

@section('content')

@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

<form action="" method="GET" role="search" class="col-md-12 mb-4">
    <div class="input-group mb-5">
        <input type="text" class="form-control br-tl-7 br-bl-7" placeholder="Search ..." name="search" value="{{request()->get('search')}}">
        <div class="input-group-append ">
            <button type="button" class="btn btn-primary br-tr-7 br-br-7">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</form>
<div class="row">

    @forelse($products as $product)
    <div class="col-lg-4">
        <div class="card mb-2 mt-2 shadow">
            <div class="card-body pb-0">
                <div class="text-center">
                    <img src="{{ asset($product->image) }}" alt="img" class="img-fluid card-img card-img-top">
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <a>{{ $product->name }}</a>
                    </div>
                    <div>
                        <span>{{ $product->price }}</span>
                        <span>{{ $product->currency }}</span>
                    </div>
                </div>
            </div>
            <div class="text-center card-footer">

                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <button name="id" value="{{ $product->id }}" class="btn btn-primary btn-sm mt-4 mb-4"><i class="fa fa-shopping-cart pr-2"></i> Add to cart</button>
                </form>

            </div>
        </div>
    </div>
    @empty
    <div class="col-md-12 text-center">
        <h4>No shoes found</h4>
    </div>
    @endforelse
</div>
<div class="pt-4 row">
    <div class="mx-auto">

        {{ $products->links() }}

    </div>
</div>
@endsection
