
@extends('admin.nav')
@section('content')


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
       
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
       
         <h1 class="h2">Users</h1>
    
         <div class="btn-toolbar mb-2 mb-md-0">
         <a href="{{ route('admin.adduser') }}" class="btn btn-primary">Add A New User</a>

         </div>
       </div>




       <!-- Users
        -->
       <div class="row">
		
        
        <div class="col-md-12">
        
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>First Name</th>
                    <th>Last Name</th>
                     <th>Address</th>
                     <th>Email</th>
                     <th>Contact</th>
                      <th>Edit</th>
                      
                       <th>Delete</th>
                   </thead>
    <tbody>
    
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td>Mohsin</td>
    <td>Irshad</td>
    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
    <td>isometric.mohsin@gmail.com</td>
    <td>+923335586757</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
 <tr>
    
 </tbody>
        
        </table>
        


@endsection