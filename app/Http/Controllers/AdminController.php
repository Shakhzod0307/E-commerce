<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders')->with('orders',$orders);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function delivered(string $id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'Delivered';
        $order->payment_status = 'Paid';
        $order->save();
        return redirect()->back();

    }

    public function print_order(string $id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('print_order_'.$order->id.'.pdf');


    }


    /**
     * Store a newly created resource in storage.
     */
    public function search_data(Request $request)
    {
        $searchdata = $request->search;
        $orders = Order::where('name','LIKE',"%$searchdata%")->Orwhere('phone','LIKE',"%$searchdata%")->Orwhere('product_title','LIKE',"%$searchdata%")->get();
        return view('admin.orders',compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
