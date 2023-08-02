<!DOCTYPE html>
<html>
<head>
<title>Print PDF</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<h1 style="text-align: center;">This is a Order PDF</h1>
<div class="card mb-3">
  <div class="row no-gutters">

    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title">Customer Name: {{$order->name}} </h4>
        <h4 class="card-title">Customer Email: {{$order->email}} </h4>
        <h4 class="card-title">Customer ID: {{$order->user_id}} </h4>
        <h4 class="card-text">Customer phone: {{$order->phone}}</h4>
        <h4 class="card-text">Customer address: {{$order->address}}</h4>
        <h4 class="card-text">Product Title: {{$order->product_title}}</h4>
        <h4 class="card-text">Product ID: {{$order->Product_id}}</h4>
        <h4 class="card-text">Product Price: ${{$order->price}}</h4>
        <h4 class="card-text">Product Quantity: {{$order->quantity}}</h4>
        <h4 class="card-text" style="color: green;">Payment Status: {{$order->payment_status}}</h4>
        <h4 class="card-text" style="color: red;">Delivery Status: {{$order->delivery_status}}</h4>
        
      </div>
    <div class="col-md-4">
        <img style="height: 250px;" src="admin/assets/products/{{$order->image}}" >
    </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>