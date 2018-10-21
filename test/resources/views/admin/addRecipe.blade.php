
@extends('admin.nav')
@section('content')



 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
       
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
       
         <h1 class="h2">Add Recipe</h1>
    
         <div class="btn-toolbar mb-2 mb-md-0">
         

         </div>
       </div>


   <div class="row">
   <div class="col-md-12">
   @if (session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif
   <form method="POST" action="{{ route('admin.user.add') }}" class="">

    {{ csrf_field() }}
   <div>
   <label>Recipe Name</label>  <input class="form-control" name="RecipeName"  type="text">
   </div>
   <div>
   <label>Required Items</label><textarea class="form-control" name="Items" ></textarea>
   </div>
    <div>
    <label>Details</label> <Textarea class="form-control" name="Details" ></Textarea>
    </div>
  

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
    </form>
   







@endsection