@extends('layouts.app')

@section('content')


@foreach ($recipes as $row)
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
                        <a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
       @endforeach
@endsection
