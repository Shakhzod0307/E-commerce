<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
      <title>E-Commerce</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
  

    @include('home.header')

      


      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
                @if (session('success'))
                <div class="alert alert-success" style="text-align: center;">
                    {{session('success')}}
                </div>                    
                @endif

               <h2>
                  Your <span>orders</span>
               </h2>
               <div class="card shadow mb-4 my-3" style="background-color: white; width: 100%;">
                <div style="background-color: black;" class="card-header py-3">
                </div>   
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">N</th>
                                        <th  style="width: 30%;">Title</th>         
                                        <th>Quantity</th>         
                                        <th>Price</th>         
                                        <th>Payment Status</th>         
                                        <th>Delivery Status</th>         
                                        <th  style="width: 40%;">Image</th>                 
                                        <th style="width: 25%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 5%;">N</th>
                                        <th  style="width: 5%;">Title</th>         
                                        <th>Quantity</th>         
                                        <th  style="width: 15%;">Price</th>
                                        <th>Payment Status</th>         
                                        <th>Delivery Status</th>           
                                        <th  style="width: 40%;">Image</th>       
                                        <th style="width: 25%;">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $total_price = 0 ?>
                                    @foreach ($orders as $order)
                                        
                                                                                                          
                                    <tr>
                                        <td style="padding-top: 125px;">{{$loop->iteration}}</td>
                                        <td style="padding-top: 125px;">{{$order->product_title}}</td>
                                        <td style="padding-top: 125px;">{{$order->quantity}}</td>
                                        <td style="padding-top: 125px;">${{$order->price}}</td>
                                        <td style="color:green;padding-top: 125px;">{{$order->payment_status}}</td>
                                        <td style="color:red;padding-top: 125px;">{{$order->delivery_status}}</td>
                                        <td style="color:red;"><img style="height: 250px;" src="{{asset('admin/assets/products/'.$order->image)}}" alt="..."></td>
                                        
                                        @if ($order->delivery_status=='You canceled the order')
                                            <td style="color:darkblue;">Not Allowed</td>
                                        @else
                                        <td>                                
                                        <a  onclick="return confirm('Are you sure to Cancel ?')" href="{{route('user_order_cancel',$order->id)}}" class="btn btn-danger" >Cancel</a>
                                        </td>
                                        @endif
                                    </tr>  
                                    @endforeach                                  
                                   
                                </tbody>
                            </table>
                        
                       
                        </div>
                    </div>
                </div>
            
           </div>
         </div>   
      </section>







      <!-- footer start -->
       
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://github.com/Shakhzod0307/">Shakhzod Rashidov</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('js/custom.js')}}"></script>
   </body>
</html>