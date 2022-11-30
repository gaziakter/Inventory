@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Edit Supplier </h4> <hr>
            

            <form method="post" action="{{route('supplier.update2')}}" id="myForm" >
                @csrf

                <input type="hidden" name="id" value="{{$supplier->id}}" >

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" value="{{$supplier->name}}">
                </div>
            </div>
            <!-- end row -->
          
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Adderss</label>
                <div class="form-group col-sm-10">
                    <input name="address" class="form-control" type="text" value="{{$supplier->address}}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Mobile</label>
                <div class="form-group col-sm-10">
                    <input name="mobile_no" class="form-control" type="tel" value="{{$supplier->mobile_no}}">
                </div>
            </div>
            <!-- end row -->
     
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier email</label>
                <div class=" form-group col-sm-10">
                    <input name="email" class="form-control" type="email" value="{{$supplier->email}}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Supplier">
                </div>
            </div>
            <!-- end row -->

            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                address: {
                    required : true,
                },
                 mobile_no: {
                    required : true,
                },
                 email: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Supplier Name',
                },
                address: {
                    required : 'Please Enter Supplier Address',
                },
                mobile_no: {
                    required : 'Please Enter Supplier Mobile Number',
                },
                email: {
                    required : 'Please Enter Supplier Email',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
 
@endsection 
