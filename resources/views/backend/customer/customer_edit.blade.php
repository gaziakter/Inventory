@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Edit Customer </h4> <hr>
            

            <form method="post" action="{{route('customer.update')}}" id="myForm" enctype="multipart/form-data" >
                @csrf

                <input type="hidden" name="id" value="{{$customer->id}}">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" value="{{$customer->name}}">
                </div>
            </div>
            <!-- end row -->
          
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Adderss</label>
                <div class="form-group col-sm-10">
                    <input name="address" class="form-control" type="text" value="{{$customer->address}}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Mobile</label>
                <div class="form-group col-sm-10">
                    <input name="mobile_no" class="form-control" type="tel" value="{{$customer->mobile_no}}">
                </div>
            </div>
            <!-- end row -->
     
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer email</label>
                <div class="form-group col-sm-10">
                    <input name="email" class="form-control" type="email" value="{{$customer->email}}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image</label>
                <div class="form-group col-sm-10">
                    <input name="image" class="form-control" type="file" id="input_picture">
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <img id="show_picture" src="{{asset($customer->image)}}" alt="avatar-5" class="rounded avatar-lg">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Customer">
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
                    required : 'Please Enter Name',
                },
                address: {
                    required : 'Please Enter Address',
                },
                mobile_no: {
                    required : 'Please Enter Mobile Number',
                },
                email: {
                    required : 'Please Enter Email',
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

<!-- Show input or defelt image -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#input_picture').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#show_picture').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
</script>

 
@endsection 
