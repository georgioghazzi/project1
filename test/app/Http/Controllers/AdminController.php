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
    public function Orders()
    {
        $orders = orders::all();
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('/admin/orders',['orders' => $orders]);
    }

    public function recipes()
    {

        $recipes = recipes::all()->toArray();
        return view('/admin/recipes',compact('recipes'));
    }
    public function users()
    {

        $user = user::all()->toArray();
        return view('/admin/users',compact('user'));
    }
    public function addUser()
    {
        return view('/admin/adduser');
    }


    public function postaddUser(Request $request)
    {

        if ($request->role == "Chef")
        {
            
        }
        if ($request->role == "Admin")
        {
            $admin = new Admin;
            $admin->name=$request->name;
            $admin->email=$request->email;
            $admin->password=Hash::make($request->password);
            $admin->save();
            session()->flash('message', 'User Added.');
            return redirect()->route('admin.users');
            
        }
        if ($request->role == "PACKAGING_Staff")
        {

        }

    }

    public function addRecipe()
    {
        return view('/admin/addRecipe');
    }
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
