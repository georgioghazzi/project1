
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
   <form method="POST" @if(empty($rec)) action="{{ route('admin.add.Recipe') }}" @endif  @if(!empty($rec) > 0)    action="{{ route('admin.update.recipe', $rec['id'] ) }}"  @endif  >

    {{ csrf_field() }}
   <div>
   <label>Recipe Name</label>  <input class="form-control" @if(!empty($recipes) > 0) value={{ $recipes['name'] }} disabled @endif name="RecipeName"  @if(!empty($rec) > 0) value={{ $rec['name'] }} @endif type="text">
   </div>
   <div>
   <label>Required Items</label><textarea class="form-control txtarea" @if(!empty($recipes) > 0) disabled @endif name="Items">@if(!empty($recipes) > 0) {{ $recipes['items'] }} @endif @if(!empty($rec) > 0) {{ $rec['items'] }} @endif</textarea>
   </div>
    <div>
    <label>Details</label> <Textarea class="form-control txtarea" @if(!empty($recipes) > 0) disabled @endif  name="Description" >@if(!empty($recipes) > 0) {{ $recipes['description'] }} @endif @if(!empty($rec) > 0) {{ $rec['description'] }} @endif</Textarea>
    </div>
    <div>
    <Label>Price</Label><input class="form-control " @if(!empty($recipes) > 0) value={{ $recipes['Price'] }} disabled @endif @if(!empty($rec) > 0) value={{ $rec['Price'] }} @endif name="Price" type="number" step="0.01">
    </div>
    <div>
    <Label>Image URL:</Label><input class="form-control" @if(!empty($recipes) > 0) value={{ $recipes['imagePath']}}  disabled  @endif @if(!empty($rec) > 0) value={{ $rec['imagePath'] }} @endif name="imagePath" type="text">
    </div>
    <div class="buttons">
    <button type="submit" class="btn btn-success" @if(!empty($recipes) > 0) disabled hidden="hidden" @endif>@if(empty($rec))Save @endif @if(!empty($rec) > 0)Update @endif</button>
    <a href="{{ route('admin.recipes') }}" class="btn btn-secondary">Cancel</a>
    </div>
    </form>
   







@endsection