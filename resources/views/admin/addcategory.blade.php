@extends('admin.home')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row"  style="text-align:center">
            <h1 style="font-size:40px;" class="alert alert-primary ">Add Category</h1>
            <div style="margin-top: 40px;">
                <form action="{{route('store_category')}}" method="POST">
                    @csrf
                    <input type="text" name="category_name" style="color:black" placeholder="Write category name" required>
                    <p class="my-3">
                    <a href="{{route('view_category')}}" class="btn btn-secondary">Back</a>
                    <button class=" btn btn-success"  type="submit">Add Category</button>
                    </p>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection