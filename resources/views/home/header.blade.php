<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{route('index')}}"><img width="250" src="{{asset('images/logo.png')}}" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="about.html">About</a></li>
                              <li><a href="testimonial.html">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="product.html">Products</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('show_cart')}}">Cart</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('user_order')}}">Order</a>
                        </li>


                        
                        @if (Route::has('login'))
                              
                              @auth
                                 @if(Auth::user()->user_type == '1' )
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">{{Auth::user()->name}} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                       <li><a href="{{ route('redirect') }}">Admin</a></li>
                                       <li><a href="{{ url('user/profile') }}">Profile</a></li>
                                       <li>
                                          <form method="POST" action="{{ route('logout') }}" class="inline">
                                             @csrf

                                             <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                                                   {{ __('Log Out') }}
                                             </button>
                                          </form>
                                       </li>
                                    </ul>
                                 </li>





                                 @else

                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">{{Auth::user()->name}} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                       <li><a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2" href="{{ url('user/profile') }}">Profile</a></li>
                                       <li>
                                          <form method="POST" action="{{ route('logout') }}" class="inline">
                                             @csrf

                                             <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                                                   {{ __('Log Out') }}
                                             </button>
                                          </form>
                                       </li>
                                    </ul>
                                 </li>
                                 @endif
                              @else
                              <li class="nav-item">
                                 <a href="{{ route('login') }}" class="nav-link">Log in</a>
                              </li>
                                 @if (Route::has('register'))
                                 <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                 </li>
                                 @endif
                              @endauth
                          
                        @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </header>