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

<div class="card">
  <div class="card-header">
    <h5>{{ $billing->firstName }} {{ $billing->lastName }}</h5>
    <h6>invoice # 12345</h6>
    <h6>{{ date('Y-m-d H:i:s') }}</h6>
  </div>
  <div class="card-body">

        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <strong>{{ number_format($total) }}</strong>
          </li>
        </ul>

  </div>
  <div class="card-footer">
    Thank you for shoping at the Shoe-store.
  </div>
</div>

@endsection