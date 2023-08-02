@extends('admin.home')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

<div class="content-wrapper">
    <div class="container">
        <div class="row"  style="text-align:center">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
            <h1 style="font-size:40px;" class="alert alert-primary ">Categories</h1>
            <div>
            <a href="{{route('add_category')}}" style="margin-right: 88%;" class="alert alert-success ">Add Category</a>
            <div class="card shadow mb-4 my-3" style="background-color: white;">
                <div class="card-header py-3">
                </div>   
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">N</th>
                                        <th>Name</th>         
                                        <th style="width: 25%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 5%;">N</th>
                                        <th>Name</th>       
                                        <th style="width: 25%;">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($categories as $c )                                                                           
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td style="color:red;">{{$c->category_name}}</td>
                                        <td>
                                        
                                        <a  href="{{url('/edit/category/'.$c->id)}}" class='btn btn-info'><i class='fa fa-edit'>Edit</i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" href="{{route('delete_category',$c->id)}}" class='btn btn-danger'><i class='fa fa-trash'>Delete</i></a>
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