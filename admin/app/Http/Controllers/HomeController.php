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


     //Get All Recipes (Used In API)
    public function index()
    {

        $recipes = recipes::all();
        return $recipes;
    }

    //Search By ID (Used in API)
    public function searchByID($id)
    {
        $recipes = recipes::find($id);
        return $recipes;
    }

    //Add Order Via API
    public function addOrder(Request $request){
        $items=[];
       $data = $request->only('name','email','total','address','time','total','date_ordered');  
        $cart=$request->only('cart');
        foreach ($cart as $item){
                foreach ($item as $i){
                   $items[]=array("name"=>$i['name'],"price"=>$i['Price'],"qtt"=>$i['qtt']);
                }
        };
        $items = json_encode($items);
     $order= new Orders();
     $order->cart = ($items);
     $order->address = $request->address;
     $order->email = $request->email;
     $order->name = $request->name;
     $order->time = $request->time;
     $order->date_ordered = $request->date_ordered;
     $order->total = $request->total;
     $order->save(); 
       
       
    

    }

    // Add To Cart (WEB)(Useless)
    public function getAddtoCart(Request $request , $id)
    {
        $recipes = recipes::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($recipes,$recipes->id);

        $request->session()->put('cart',$cart);
        return redirect()->route('home');
    }


    //Get Cart (WEB)(Useless)
    public function getCart()
    {
        if (!Session::has('cart')){
                return view('front.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('front.shopping-cart',['recipes' =>$cart->items,'totalPrice'=>$cart->totalPrice]);

    }
    //Checkout (WEB)(Useless)
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

    //Checkout Guest (WEB)(Useless)
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
    
    //POST CHECKOUT (WEB)(Uuseless)
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
