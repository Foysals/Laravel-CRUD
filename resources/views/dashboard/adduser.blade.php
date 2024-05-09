@extends('dashboard.layouts.app')
@section('title','Add User')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
     <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add User</h4>
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
                    <h4 class="card-title">Add a new User</h4>
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
                    <form class="forms-sample" action="{{route('store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1"> Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="type user name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="type user email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Number</label>
                        <input type="number" class="form-control" id="number" name="number" placeholder="type user number">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1"> Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="type user address">
                      <div class="form-group">
                        <label> Image</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="image" name="image">
                          <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success mr-3 mt-3">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            
                
          
        </div> <!-- end row -->
    </div> <!-- end container -->



@endsection