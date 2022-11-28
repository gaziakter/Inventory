@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add Customer </h4> <hr>
            

            <form method="post" action="{{route('customer.store')}}" id="myForm" >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->
          
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Adderss</label>
                <div class="form-group col-sm-10">
                    <input name="address" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Mobile</label>
                <div class="form-group col-sm-10">
                    <input name="mobile_no" class="form-control" type="tel">
                </div>
            </div>
            <!-- end row -->
     
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer email</label>
                <div class=" form-group col-sm-10">
                    <input name="email" class="form-control" type="email">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Customer">
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
