@if(count(\Cart::getContent()) > 0)
    @foreach(\Cart::getContent() as $shoe)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ asset($shoe->attributes->image) }}"
                         style="width: 50px; height: 50px;"
                    >
                </div>
                <div class="col-lg-6">
                    <b>{{$shoe->name}}</b>
                    <br><small>Qty: {{$shoe->quantity}}</small>
                </div>
                <div class="col-lg-3">
                    <p>{{ number_format(\Cart::get($shoe->id)->getPriceSum()) }} {{$shoe->attributes->currency}}</p>
                </div>
                <hr>
            </div>
        </li>
    @endforeach
    <br>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-10">
                <b>Total: </b>{{ number_format(\Cart::getTotal()) }}
            </div>
            <div class="col-lg-2">
                <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    </li>
    <br>
    <div class="row" style="margin: 0px;">
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">
            CART <i class="fa fa-arrow-right"></i>
        </a>
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('checkout') }}">
            CHECKOUT <i class="fa fa-arrow-right"></i>
        </a>
    </div>
@else
    <li class="list-group-item">Your Cart is Empty</li>
@endif