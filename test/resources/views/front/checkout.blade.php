@extends('layouts.app')

@section('content')


<div class="row">
<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
<h1>Checkout</h1>
<h4><span class=red>Your Total : {{ $total }}$</span></h4>
<form action="{{ route('checkout') }}" method="post">
<div class="row">
<form action="{{ route('checkout') }}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="{{ Auth::user()->address }}"class="form-control" required>
                        </div>
                    </div>
                    <hr>
                   
                   
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Buy now</button>
            </form>


</div>
</form>
</div>
</div>








@endsection