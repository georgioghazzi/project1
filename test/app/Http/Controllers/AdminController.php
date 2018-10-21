<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use app\Admin;


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
    public function recipes()
    {
        return view('/admin/Recipes');
    }
    public function orders()
    {
        return view('/admin/orders');
    }
    public function users()
    {

   
        return view('/admin/users');
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
            return redirect()->route('admin.user.add');
            
        }
        if ($request->role == "PACKAGING_Staff")
        {

        }

    }

    public function addRecipe()
    {
        return view('/admin/addRecipe');
    }
}
