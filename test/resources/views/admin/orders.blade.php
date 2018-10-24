
@extends('admin.nav')
@section('content')


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
       
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
       
         <h1 class="h2">Orders</h1>
    
       </div>
     

  <div class="row">
 
     
 <div class="col-md-12">
 @if (session()->has('message'))
 <div class="alert alert-info">
     {{ session('message') }}
 </div>
@endif
 <div class="table-responsive">

         
       <table id="mytable" class="table table-bordred table-striped">
            
            <thead>
            

            <th>Order ID</th>
             <th>Customer Name</th>
             <th>Items Bought</th>
             <th>Address</th>
             <th>Delivery Time</th>
             <th>Total</th>
             <th>View</th>
              <th>Edit</th>
               <th>Delete</th>
            </thead>
<tbody>
@foreach ($orders as $row)
<tr>
<td>{{ $row['id'] }}</td>
<td >{{ $row['name'] }}</td>
<td>
@foreach ($row->cart->items as $item)
<li class="list-group-item">
{{ $item['item']['name'] }} | {{ $item['qtt']}} Unit(s)
<span class="badge">{{ $item['Price'] }}$</span>
</li>
@endforeach
</td>
<td>{{ $row['address'] }}</td>
<td>{{ $row['time'] }}</td>
<td>{{ $row->cart->totalPrice }}$</td>

<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-success btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="far fa-eye fa-xs"></span></button></p></td>
<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="far fa-edit fa-xs"></span></button></p></td>
<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="far fa-trash-alt fa-xs"></span></button></p></td>
</tr>
@endforeach
<tr>

</tbody>
 
 </table>



@endsection