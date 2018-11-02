@extends('admin.nav')
@section('content')


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
       
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          
            <h1 class="h2">Recipes</h1>
       
            <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.addRecipe') }}" class="btn btn-primary">Add A Recipe</a>
            </div>
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
               

               <th>Recipe Name</th>
               <th>Items</th>
                <th>Details</th>
                <th>Price</th>
                <th>View</th>
                 <th>Edit</th>
                  <th>Delete</th>
               </thead>
<tbody>
@foreach ($recipes as $row)
<tr>
<td>{{ $row['name'] }}</td>
<td >{{ $row['items'] }}</td>
<td >{{ $row['description'] }}</td>
<td>{{ $row['Price'] }}$</td>
<td><p  title="View"><a class="btn btn-success btn-xs view"  href="{{ route('admin.view.recipe', $row['id']) }}""><span class="far fa-eye fa-xs"></span></a></p></td>
<td><p  title="Edit"><button class="btn btn-primary btn-xs delete" data-confirm="Are you sure to edit this item?" href="{{ route('admin.edit.recipe', $row['id']) }}""><span class="far fa-edit fa-xs"></span></button></p></td>
<td><p  title="Delete"><button class="btn btn-danger btn-xs delete" data-confirm="Are you sure to delete this item?" href="{{ route('admin.delete.recipe', $row['id'] ) }}" ><span class="far fa-trash-alt fa-xs"></span></button></p></td>
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
