@extends('admin.home')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

<div class="content-wrapper">
    <div class="container">
        <div class="row"  style="text-align:center">

            <h1 style="font-size:40px;" class="alert alert-primary ">Orders</h1>
            <div>
            <form action="{{route('search_data')}}" method="get">
                
                <input type="text" name="search" style="color:black;width:50%;" id="search" placeholder="Search For Something">
                <input type="submit" class="btn btn-primary" value="Search">
            </form>
            <div class="card shadow mb-4 my-3" style="background-color: white;">
                <div class="card-header py-3">
                </div>   
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="background-color: black;">
                                        <th style="width: 5%;">N</th>
                                        <th>Name</th>         
                                        <th>Email</th>         
                                        <th>Phone</th>         
                                        <th>Address</th>         
                                        <th>Product Title</th>         
                                        <th>Price</th>         
                                        <th>Quantity</th>         
                                        <th>Payment Status</th>         
                                        <th>Delivery Status</th>         
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Print Pdf</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 5%;">N</th>
                                        <th>Name</th>         
                                        <th>Email</th>         
                                        <th>Phone</th>         
                                        <th>Address</th>         
                                        <th>Product Title</th>         
                                        <th>Price</th>         
                                        <th>Quantity</th>         
                                        <th>Payment Status</th>         
                                        <th>Delivery Status</th>       
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Print Pdf</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($orders as $order )                                                                           
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->product_title}}</td>
                                        <td>${{$order->price}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->payment_status}}</td>
                                        <td>{{$order->delivery_status}}</td>
                                        <td><img style="height: 100px;width:120px;" src="{{asset('admin/assets/products/'.$order->image)}}" class="" alt="..."></td>
                                        
                                        @if($order->delivery_status=='Delivered')
                                            <td style="color:green">
                                                Delivered
                                            </td>

                                        @else
                                        <td>
                                            <a onclick="return confirm('Are you sure this is delivered!!!')" href="{{route('delivered_admin',$order->id)}}" class="btn btn-primary">Delivered</a>
                                        </td>
                                        @endif
                                        <td>
                                            <a href="{{route('print_order',$order->id)}}" class="btn btn-info">Print</a>
                                        </td>

                                    </tr>                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</div>
@endsection