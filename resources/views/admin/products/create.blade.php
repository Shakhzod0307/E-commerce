@extends('admin.home')

@section('content')
<div class="content-wrapper">
    <div class="container">

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
                <h1 style="font-size:40px;text-align:center" class="alert alert-primary ">Add Product</h1>
                <form action="{{route('store_product')}}"  style="color:white" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group" >
                        <label for="title">Title</label>
                        <input type="text" style="background-color:white;color:black" name="title" class="form-control" id="title" >
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input type="text" style="background-color:white;color:black" name="description" class="form-control" id="text">
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" style="background-color:white;color:black" name="image" class="form-control" id="img">
                    </div>
                    <div class="form-group">
                        <label for="cat">Category</label>
                        <!-- <input type="text" style="background-color:white;color:black" name="category" class="form-control" id="cat"> -->
                        <select id="cat" name="category" style="background-color:white;color:black" class="form-control">
                            <option selected>Choose....</option> 
                            @foreach ($category as $name)
                                <option >{{$name}}</option> 
                            @endforeach    
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="q">Quantity</label>
                        <input type="text" style="background-color:white;color:black" name="quantity" class="form-control" id="q">
                    </div>
                    <div class="form-group">
                        <label for="p">Price</label>
                        <input type="number" style="background-color:white;color:black" name="price" class="form-control" id="p">
                    </div>
                    <div class="form-group">
                        <label for="disc">Discount price</label>
                        <input type="number" style="background-color:white;color:black" name="discount_price" class="form-control" id="disc">
                    </div>
                    <a href="{{route('products')}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>  
</div>


@endsection          