@extends('layouts.app')

@section('content')


<div class="row">
<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
<h1>Guest Checkout</h1>
<h4><span class=red>Your Total : {{ $total }}$</span></h4>
<br>
<div class="row">
<form action="{{ route('checkout') }}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">
                        <div class="form-group">
                    <select name="time" class="form-control">
                   <option value="12am">12 am</option>
                   <option value="1pm">1 pm</option>
                   <option value="2pm"> 2 pm</option>
                   <option value="3pm">3 pm</option>
                   <option value="4pm">4 pm</option>
                   <option value="5pm">5 pm</option>
                   <option value="6pm">6 pm</option>
                   <option value="7pm">7 pm</option>
                   <option value="8pm">8 pm</option>
                   </select>
                        </div>
                        
                    </div>
                   
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Buy now</button>
            </form>



</div>
</form>
</div>
</div>








@endsection