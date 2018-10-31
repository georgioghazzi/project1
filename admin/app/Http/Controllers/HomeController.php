<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipes;
use Session;
use App\Cart;
use App\Orders;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $recipes = recipes::all();
        return $recipes;
    }
    public function searchByID($id)
    {
        $recipes = recipes::find($id);
        return $recipes;
    }
    public function addOrder(Request $request){
        $items=[];
       $data = $request->only('name','email','total','address','time');  
        $cart=$request->only('cart');
        foreach ($cart as $item){
                foreach ($item as $i){
                   $items[]=array("name"=>$i['name'],"price"=>$i['Price']);
                }
        };
        $items = json_encode($items);
     $order= new Orders();
     $order->cart = ($items);
     $order->address = $request->address;
     $order->email = $request->email;
     $order->name = $request->name;
     $order->time = $request->time;
     $order->total = $request->total;
     $order->save(); 
       
       
    

    }
    public function getAddtoCart(Request $request , $id)
    {
        $recipes = recipes::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($recipes,$recipes->id);

        $request->session()->put('cart',$cart);
        return redirect()->route('home');
    }

    public function getCart()
    {
        if (!Session::has('cart')){
                return view('front.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('front.shopping-cart',['recipes' =>$cart->items,'totalPrice'=>$cart->totalPrice]);

    }

    public function checkout()
    {
        if(!Session::has('cart')){
            return view('front.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('front.checkout',['total'=>$total]);
    }

    public function guestCheckout()
    {
        if(!Session::has('cart')){
            return view('front.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('front.GuestCheckout',['total'=>$total]);
    }
    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $order= new Orders();
        $order->cart = serialize($cart);
        $order->address = $request->address;
        $order->email = $request->email;
        $order->name = $request->name;
        $order->time = $request->time;
        $order->save();
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Successfully purchased products!');
    }
}
