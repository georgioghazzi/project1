@extends('layouts.app')

@section('content')


@foreach ($recipes as $row)
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
<div class="row">
<div class=container>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src={{ $row['imagePath'] }} alt="..." class="img-responsive">
                <div class="caption">
                    <h3>{{ $row['name'] }}</h3>
                    <p class="description">{{ $row['description'] }}</p>
                    <div class="clearfix">
                        <div class="pull-left price">{{ $row['Price'] }}$</div>
                        <a href="{{ route('add.to.cart' , ['id' => $row['id']]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
       @endforeach
@endsection
