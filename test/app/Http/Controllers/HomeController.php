<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $recipes = recipes::all()->toArray();
        return view('/front/home',compact('recipes'));
    }
}
