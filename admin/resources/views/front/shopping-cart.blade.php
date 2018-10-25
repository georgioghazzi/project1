@extends('layouts.app')

@section('content')
@if(Session::has('cart'))
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
    <ul class="list-group">
        @foreach ($recipes as $row)
                <li class="list-group-item">
                <span class="badge">{{ $row['qtt']  }}</span>
                <strong>{{ $row['item']['name'] }}</strong>
                <span class="label label-success">{{ $row['Price'] }}</span>
                </li>

        @endforeach
    </ul>
    
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>Total: {{  $totalPrice   }}</strong>
        </div>
        </div>
        <hr>
    <div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
    
    <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
    <a href="{{ route('guestCheckout') }}" type="button" class="btn btn-primary">Checkout As A Guest</a>
    </div>    
    </div>

    
    
    
@else
<div class="row">
<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
    
<h2>No Items in Cart :(</h2>
</div>
</div>


@endif

@endsection