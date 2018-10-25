
@extends('admin.nav')
@section('content')



 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
       
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
       
         <h1 class="h2">Add User</h1>
    
         <div class="btn-toolbar mb-2 mb-md-0">
         

         </div>
       </div>


   <div class="row">
   <div class="col-md-12">

   <form method="POST" action="{{ route('admin.user.add') }}" class="">

    {{ csrf_field() }}
   <div>
   <label>Name</label>  <input class="form-control" name="name" type="text" required>
   </div>
   <div>
   <label>Email</label><input class="form-control" name="email"  type="email" required>
   </div>
    <div>
    <label>Password</label> <input class="form-control" id="password" name="password" type="password" required>
    </div>
  <div>
    <label>Confirm Password</label> <input class="form-control" id="password_confirmation" name="password_confirmation"  type="password" required> 
  </div>
    <div>
    <label>Role:</label><select name="role"  class="form-control">
    <option>Chef</option>
    <option>PACKAGING_Staff</option>
    <option>Admin</option>
    </select>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
    </form>
   







@endsection