@extends('admin.home')

@section('content')
<div class="content-wrapper">
    <div class="container">

    <div class="row"  style="text-align:center">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
            <h1 style="font-size:40px;" class="alert alert-primary ">Products</h1>
            <div>
            <a href="{{route('add_product')}}" style="margin-right: 88%;" class="alert alert-success ">Add Product</a>

            <div class="row row-cols-4 row-cols-md-4 my-4">
            @foreach ( $products as $p )
            
                <div class="col mb-4">
                    <div class="card">
                    <img style="height: 250px;" src="{{asset('admin/assets/products/'.$p->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Title: {{$p->title}} || Category: {{$p->category}}</h5>
                        <p id="text" class="card-text">Description: {{$p->description}}</p>
                        <p class="card-text">Quantity: {{$p->quantity}} | Price: ${{$p->price}}</p>
                        <p class="my-3">
                        <a href="{{route('edit_product',$p->id)}}" class="card-text btn btn-primary">Edit</a>
                        <a  onclick="return confirm('Are you sure to delete?')" href="{{route('destroy_product',$p->id)}}" class="card-text btn btn-danger">Delete</a>
                        </p>    
                    </div>
                    </div>
                </div>

                @endforeach
            </div>  
        </div>
    </div>
</div>
<script>
  var text = document.getElementById("text");
  text.addEventListener("click", function() {
    text.classList.toggle("short-text");
  });
</script>

<style>
  .short-text {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
</style>
@endsection