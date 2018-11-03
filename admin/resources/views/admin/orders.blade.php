
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
             <th>Date Ordered</th>
             <th>Total</th>
             <th>View</th>
               <th>Delete</th>
            </thead>
<tbody>
@foreach ($orders as $row)

<tr>
<td>{{ $row['id'] }}</td>
<td >{{ $row['name'] }}</td>
<td>

@foreach ($row->cart as $item)
<li class="list-group-item">
{{ strtoupper($item['name']) }} &nbsp;&nbsp; | &nbsp;&nbsp;{{ $item['qtt'] }}  Unit(s)
<span class="badge">Unit Price : {{ $item['price'] }}</span>
</li>

@endforeach



</td>
<td>{{ $row['address'] }}</td>
<td>{{ $row['time'] }}</td>
<td>{{ $row['date_ordered'] }}</td>
<td>{{ $row['total'] }}$</td>


<td><p  title="View"><a class="btn btn-success btn-xs" ><span class="far fa-eye fa-xs"></span></button></p></td>
<td><p  title="Delete"><button class="btn btn-danger btn-xs delete" data-confirm="Are you sure to delete this item?" ><span class="far fa-trash-alt fa-xs"></span></button></p></td>
</tr>
@endforeach
<tr>

</tbody>
 
 </table>


<script>
 var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
 </script>

@endsection