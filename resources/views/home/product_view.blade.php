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
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
               <h2>
                  Our <span>product</span>
               </h2>
            </div>
            <div class="row">
            <div class="card col-12">
                <div class="row no-gutters">
                    <div class="col-md-5">
                    <img style="height: 100%;width:80%;" src="{{asset('admin/assets/products/'.$product->image)}}" alt="...">
                    </div>
                    <div class="col-md-7 ">
                    <div class="card-body my-3">
                        <h5 class="card-title">Product title: {{$product->title}}</h5>
                        @if ($product->discount_price != null)
                        <h6 style="color:red;">
                        Discount price: ${{$product->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color:blue;">
                        Price: ${{$product->price}}
                        </h6>
                        @else
                        <h6 style="color:blue;">
                        Price: ${{$product->price}}
                        </h6>
                        @endif
                        <h5 class="card-text">Product Category: {{$product->category}}</h5>
                        <h5 class="card-text">Product description:<br><p style="font-size:16px;padding-top:5px;">{{$product->description}}</p></h5>
                        <p class="card-text"><small class="text-muted">Product quantity: {{$product->quantity}} </small></p>
                        <form action="{{route('add_cart',$product->id)}}" method="POST">
                            @csrf
                        <div class="row col-6">
                            <input type="number" name="quantity" min="1" value="1" class="form-control"> 
                            <input type="submit" class="btn btn-primary"value="Add to cart">
                        </div>
                        </form>                    
                    </div>
                    </div>
                </div>
                </div>
              
            </div>
         </div>   
      </section>







      <!-- footer start -->
      @include('home.footer') 
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