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
      <div class="hero_area">
         <!-- header section starts -->
            @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
             @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
            @include('home.why')
          
      <!-- end why section -->
      
      <!-- arrival section -->
            @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
        @yield('product')  
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscribe') 
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client') 
      <!-- end client section -->
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