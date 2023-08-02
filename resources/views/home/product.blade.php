@extends('home.user_page')

@section('product')
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <form action="{{route('search_product')}}" method="get">
                  @csrf
                  <input style="width:800PX;" type="text" name="search" class="" placeholder="Search Product">
                 <input type="submit" class="btn btn-primary" value="Search">
               </form>
            </div>
            <div class="row">
               @foreach ($product as $p )  
               <div class=" col-sm-6 col-md-md-4 col-lg-4">                   
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{route('show_product',$p->id)}}" class="option1">
                           Details
                           </a>
                           <!-- <a href="" class="option2">
                           Buy Now
                           </a> -->
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="{{asset('admin/assets/products/'.$p->image)}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{$p->title}}
                        </h5>
                        @if ($p->discount_price != null)
                        <h6 style="margin-left: 100px;color:red;">
                        $ {{$p->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color:blue;">
                        $ {{$p->price}}
                        </h6>
                        @else
                        <h6 style="color:blue;">
                        $ {{$p->price}}
                        </h6>
                        
                        @endif

                     </div>
                  </div>           
               </div>
               @endforeach   
               <span style="padding-top: 10px;">
                   {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
               </span>
              
      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
      </script>
            </div>
         </div>   
      </section>
@endsection      