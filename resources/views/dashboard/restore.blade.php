@extends('dashboard.layouts.app')
@section('title','Restore Bin')
@section('content')
@section("style")


	<link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection

@section("script")
    <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

<script>

    $(document).ready(function() {
        $('#datatable').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search functionality
            "ordering": true, // Enable sorting
            "lengthChange": true, // Enable per page dropdown
           
            "pageLength": 10, // Default number of items per page
            
        });
    });



function datatable(){

//$('#donateList').DataTable();
table = $('#datatable').DataTable
({
    "bAutoWidth": false,
    "destroy": true,
    "bProcessing": true,
    "serverSide": true,
    "responsive": false,
    "aaSorting": [[0, 'desc']],
    "scrollX": true,
    "scrollCollapse": true,
    "columnDefs": [
        {
            "targets": [2,3],
            "orderable": false
        }, {
            "targets": [0, 1,3],
            className: "text-center"
        }],
    "ajax": {
        url: "{{ url('mainmenu') }}",
        type: "post",
        "data": {
            _token: "{{ csrf_token() }}"
        },
        "aoColumnDefs": [{
            'bSortable': false
        }],

        "dataSrc": function (jsonData) {
            return jsonData.data;
        },
        error: function (request, status, error) {
            console.log(request.responseText);
            //toastr.warning('Server Error. Try aging!', 'Warning');
        }
    }
});
}
</script>
@endsection
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Trashed user info</h4>
                </div>
            </div>
        </div>
        
    </div> <!-- container -->

</div> <!-- content -->
<div class="container-fluid">

       
    <div class="content">
    
        <!-- Start Content-->
        <div class="container-fluid">
    
    
            <div class="row">
                <div class="col-12">
    
                    <div class="card-box">
                    <h4>Trashed user info</h4>
                   

                    @if (session()->has('message'))
                         <div class="alert alert-success">
                            {{session()->get('message')}}
                         </div>
                    @endif
                        <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th><h4>ID</h4></th>
                                    <th><h4> Name</h4></th>
                                    <th><h4>Email</h4></th>
                                    <th><h4>Number</h4></th>
                                    <th><h4>Address</h4></th>
                                    <th><h4>Image</h4></th>
                                    
                                    <th><h4>Date</h4></th>
                                    <th class="text-center text-light"><h4>Action</h4></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                       @foreach ($userinfo as $info)                         
                                    <tr>
                                        <td>{{$info->id}}</td>
                                        <td>{{$info->name}}</td>
                                        <td>{{$info->email}}</td>
                                        <td>{{$info->number}}</td>
                                        <td>{{$info->address}}</td>
                                        <td>
                                            <img src="{{asset($info->image)}}" style="height: 100px;" alt="">
                                            <br>
                                            <br>
                                          

                                        </td>
                                      
                                        <td></td>

                                        <td> 
                                            <a href="{{route('restore',$info->id)}}" class="btn btn-primary"><i class="fas fa-undo"></i></a>
                                            <a href="{{route('deletePermanently',$info->id)}}"  class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div> <!-- end row -->
    
    
        </div> <!-- container-fluid -->

        <script>
            function deleteuser(id){
                if(confirm("Are you sure you went to Delete?")){ 
                    window.location.href='{{url("/delete-userinfo-permanently")}}/'+id;
                }
            }
        </script>
@endsection