<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Recipes;
use App\Admin;
use App\Orders;
use App\User;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin/AdminPanel');
    }



    // Get All Orders From DB
    public function Orders()
    {
      


        $orders = orders::all();
        $orders->transform(function($order,$key){
            $order->cart = json_decode($order->cart , true);
            return $order;
           });
      
 
      
        
        return view('/admin/orders',['orders' => $orders]);
    }


    // Get All Recipes From DB
    public function recipes()
    {

        $recipes = recipes::all()->toArray();
        return view('/admin/recipes',compact('recipes'));
    }

    //Get All Users From DB
    public function users()
    {

        $user = admin::all()->toArray();
        return view('/admin/users',compact('user'));
    }

    //Redirect To Add User Page
    public function addUser()
    {
        return view('/admin/adduser');
    }

    //Add A User To DB
    public function postaddUser(Request $request)
    {
        if ($request->role == "Chef")
        {
            $admin = new Admin;
            $admin->name=$request->name;
            $admin->email=$request->email;
            $admin->password=Hash::make($request->password);
            $admin->user_type="chef";
            $admin->save();
            session()->flash('message', 'User Added.');
            return redirect()->route('admin.users');
        }
        if ($request->role == "Admin")
        {
            $admin = new Admin;
            $admin->name=$request->name;
            $admin->email=$request->email;
            $admin->password=Hash::make($request->password);
            $admin->user_type="admin";
            $admin->save();
            session()->flash('message', 'User Added.');
            return redirect()->route('admin.users');
            
        }
        if ($request->role == "PACKAGING_Staff")
        {
            $admin = new Admin;
            $admin->name=$request->name;
            $admin->email=$request->email;
            $admin->password=Hash::make($request->password);
            $admin->user_type="staff";
            $admin->save();
            session()->flash('message', 'User Added.');
            return redirect()->route('admin.users');
        }

    }
    public function deleteUser($id){
      

    }

    //Redirect To Forbiden Page!
    public function forbiden()
    {
       return view('/admin/forbiden');

    }

    //Redirect To Add Recipe Page.
    public function addRecipe()
    {
        return view('/admin/addRecipe');
    }
    public function deleteRecipe($id)
    {
        recipes::destroy($id);
        $recipes = recipes::all()->toArray();
        return view('/admin/recipes',compact('recipes'));


    }
    public function viewRecipe($id)
    {
        $recipes = recipes::find($id);
        return view('/admin/addrecipe',compact('recipes'));
    }
    public function editRecipe($id)
    {
        $rec = recipes::find($id);
        return view('/admin/addrecipe',compact('rec'));
    }
    
    public function updateRecipe($id , request $request){
        $recipes = recipes::find($id);
        $recipes->name=$request->RecipeName;
        $recipes->items=$request->Items;
        $recipes->description=$request->Description;
        $recipes->price = $request->Price;
        $recipes->imagePath=$request->imagePath;
        $recipes->save();
        session()->flash('message', 'Recipe Updated!');
        return redirect()->route('admin.recipes');
    }

    //Add A Recipe To DB
    public function postaddRecipe(Request $request)
    {
        $recipes = new recipes;

        $recipes->name=$request->RecipeName;
        $recipes->items=$request->Items;
        $recipes->description=$request->Description;
        $recipes->price = $request->Price;
        $recipes->imagePath=$request->imagePath;
        $recipes->save();
        session()->flash('message', 'Recipe Added.');
        return redirect()->route('admin.recipes');
    }

  
}
