@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add Purchase </h4> <hr>
            

            <form method="post" action="{{route('product.store')}}" id="myForm" >
                @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="md-3">
                        <label for="example-text-input" class="form-label">Date</label>
                        <div class="form-group col-sm-10">
                            <input name="name" class="form-control example-date-input" id="date" type="date">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-3">
                        <label for="example-text-input" class="form-label">Purchase No</label>
                        <div class="form-group col-sm-10">
                            <input name="purchase_no" class="form-control example-date-input" id="purchase_no" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-3">
                        <label for="example-text-input" class="form-label">Supplier Name</label>
                        <div class="form-group col-sm-10">
                            <select name="supplier_id" id="supplier_id" class="form-select" aria-label="Default select example">
                                <option selected="">Select Supplier</option>
                                    @foreach ($supplier as $sup)
                                        <option value="{{$sup->id}}">{{$sup->name}}</option>
                                    @endforeach
        
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-3">
                        <label for="example-text-input" class="form-label">Category Name</label>
                        <div class="form-group col-sm-10">
                            <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                                <option selected="">Select Category</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-3">
                        <label for="example-text-input" class="form-label">Product Name</label>
                        <div class="form-group col-sm-10">
                            <select name="product_id" id="product_id" class="form-select" aria-label="Default select example">
                                <option selected="">Select Product</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-3">
                        <label for="example-text-input" class="form-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-secondary" value="Add more">
                        </div>
                    </div>
                </div>
            </div><!-- end row -->





            </form>
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>

<script type="text/javascript">

     // show related Category
     $(function(){
        $(document).on('change','#supplier_id',function(){
            var supplier_id = $(this).val();
            $.ajax({
                url:"{{ route('get-category') }}",
                type: "GET",
                data:{supplier_id:supplier_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.category_id+' "> '+v.category.name+'</option>';
                    });
                    $('#category_id').html(html);
                }
            })
        });
    });
    
</script>


<script type="text/javascript">

    // show related Prodcut
    $(function(){
       $(document).on('change','#category_id',function(){
           var category_id = $(this).val();
           $.ajax({
               url:"{{ route('get-product') }}",
               type: "GET",
               data:{category_id:category_id},
               success:function(data){
                   var html = '<option value="">Select Category</option>';
                   $.each(data,function(key,v){
                       html += '<option value=" '+v.id+' "> '+v.name+'</option>';
                   });
                   $('#product_id').html(html);
               }
           })
       });
   });
   
</script>
 
@endsection 
