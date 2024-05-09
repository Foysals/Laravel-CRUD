@extends('dashboard.layouts.app')
@section('title','EDIT ')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
     <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit User information</h4>
                </div>
            </div>
        </div>
    </div> <!-- container -->

</div> <!-- content -->
<div class="container-fluid">
        <div class="row">
            <div class=" col-md-12">
                <div class="card">
                  <div class="card-header border-bottom">
                    <h4 class="card-title">Edit User information</h4>
                  </div>
                  <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif
                    <form class="forms-sample" action="{{route('update')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$userinfo->id}}" name="id">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="product_name" name="name" value="{{$userinfo->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$userinfo->email}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Number</label>
                        <input type="number" class="form-control" id="number" name="number" value="{{$userinfo->number}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$userinfo->address}}">
                      </div>
                    
                      <button type="submit" class="btn btn-success mr-3 mt-3">Update</button>
                    </form>
                  </div>
                </div>
              </div>
            
                
          
        </div> <!-- end row -->
    </div> <!-- end container -->



@endsection