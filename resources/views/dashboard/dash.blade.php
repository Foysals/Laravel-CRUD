@extends('dashboard.layouts.app')
@section('title','Dashboard')
@section("script")
        <!-- Jvector map -->
<script src="{{ asset("assets/libs/jqvmap/jquery.vmap.min.js")}}"></script>
<script src="{{ asset("assets/libs/jqvmap/jquery.vmap.usa.js")}}"></script>
<!-- Dashboard Init JS -->
<script src="{{ asset("assets/js/pages/dashboard.init.js")}}"></script>
@endsection
@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
                        <div class="float-left">
                            <i class="dripicons-user" style="font-size: 35px; color:aliceblue"></i>
                        </div>
                        <div class="widget-chart-one-content text-center">
                @if(Auth::user()->user_type==1)
                            <h3 class="text-white mb-0 mt-2">Welcome to Admin Pannel</h3>   
                            @else
                            <h3 class="text-white mb-0 mt-2">Welcome to Editor Pannel</h3>   
                            @endif
                        </div>
                    </div> <!-- end card-box-->

                </div> <!-- end col -->
              
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->



@endsection
