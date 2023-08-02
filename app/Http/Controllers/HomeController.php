<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;
use Stripe;

class HomeController extends Controller
{

    public function redirect()
    {
        $user_type = Auth::user()->user_type;
        if($user_type==1)
        {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();
            $order = Order::all();
            $total_revenue = 0;
            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->price;
            }

            $product_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
            $product_processing = Order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.content',compact('total_product','total_order','total_user','total_revenue','product_delivered','product_processing'));
        }
        else
        {
            return view('home.user_page');
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::paginate(6);
        return view('home.product')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function user_order()
    {
        $userid = Auth::user();
        $user_id = $userid->id;
        $orders = Order::where('user_id','=',$user_id)->get();
        
        return view('home.user_order',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function user_order_cancel(string $id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'You canceled the order' ;
        $order->save();
        return redirect()->back()->with('success','Order Canceled Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('home.product_view')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function add_cart(Request $request,string $id):RedirectResponse
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart();

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;
            if($product->discount_price != null)
            {
                $cart->price = $product->discount_price * $request->quantity;;
            }
            else
            {
                $cart->price = $product->price * $request->quantity;;
            }
            

            $cart->image = $product->image;
            $cart->Product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();

            return redirect()->back();
        }
        
        return redirect()->route('login');
    }


    public function show_cart()
    {
        $id = Auth::user()->id;
        $cart = Cart::where('user_id',$id)->get();
        return view('home.add_cart')->with('cart',$cart);
    }



    public function delete_cart(string $id):RedirectResponse
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function  cash_order()
    {
        $userid = Auth::user();
        $user_id = $userid->id;
        
        $date = Cart::where('user_id',$user_id)->get();
        foreach($date as $d)
        {
            $orders = new Order;
            $orders->name = $d->name;
            $orders->email = $d->email;
            $orders->phone = $d->phone;
            $orders->address = $d->address;
            $orders->product_title = $d->product_title;
            $orders->price = $d->price;
            $orders->quantity = $d->quantity;
            $orders->image = $d->image;
            $orders->Product_id = $d->Product_id;
            $orders->user_id = $d->user_id;
            $orders->payment_status = 'Cash on delivery';
            $orders->delivery_status = 'Processing';
            $orders->save();

            $cart_id = $d->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }
        return redirect()->back()->with('success','We Have Received Your Order. We Will Connect With You Soon...');



    }


    public function stripe( $total_price)
    {

        return view('home.stripe_view',compact('total_price'));
    }

    public function stripePost(Request $request,$total_price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $total_price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment!",
        ]);
        $userid = Auth::user();
        $user_id = $userid->id;
        
        $date = Cart::where('user_id',$user_id)->get();
        foreach($date as $d)
        {
            $orders = new Order;
            $orders->name = $d->name;
            $orders->email = $d->email;
            $orders->phone = $d->phone;
            $orders->address = $d->address;
            $orders->product_title = $d->product_title;
            $orders->price = $d->price;
            $orders->quantity = $d->quantity;
            $orders->image = $d->image;
            $orders->Product_id = $d->Product_id;
            $orders->user_id = $d->user_id;
            $orders->payment_status = 'Paid';
            $orders->delivery_status = 'Processing';
            $orders->save();

            $cart_id = $d->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }
        Session::flash('success', 'Payment successful!');
              
        return back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function search_product(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title','LIKE',"%$search%")->paginate(10);
        return view('home.product',compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


