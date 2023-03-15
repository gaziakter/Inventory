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
                        <label for="example-text-input" class="form-label" style="margin-top:43px;">  </label>
                
                
                        <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore"> Add More</i>
                    </div>
                </div>
            </div><!-- end row -->

            </form>
        </div>
        
        <div class="card-body">
            <form method="" action="">
                @csrf
                <table class="table-sm table-bordered" width="100%" style="border-color:#ddd;">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>PSC/KG</th>
                            <th>Unit Price</th>
                            <th>Description</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="addRow" class="addRow">

                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="5"></td>
                            <td>
                               <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;"> 
                            </td>
                            <td>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" id="storeButton">Purchase Store</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- end col -->
</div>
 
</div>
</div>


<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date[]" value="@{{date}}">
            <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
            <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
    
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{ category_name }}
        </td>
    
         <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{ product_name }}
        </td>
    
         <td>
            <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value=""> 
        </td>
    
        <td>
            <input type="number" class="form-control unit_price text-right" name="unit_price[]" value=""> 
        </td>
    
     <td>
            <input type="text" class="form-control" name="description[]"> 
        </td>
    
         <td>
            <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly> 
        </td>
    
         <td>
            <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
        </td>
    
        </tr>
    
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click",".addeventmore", function(){
                var date = $('#date').val();
                var purchase_no = $('#purchase_no').val();
                var supplier_id = $('#supplier_id').val();
                var category_id  = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();
                if(date == ''){
                    $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                     }
                      if(purchase_no == ''){
                    $.notify("Purchase No is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                     }
                      if(supplier_id == ''){
                    $.notify("Supplier is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                     }
                      if(category_id == ''){
                    $.notify("Category is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                     }
                      if(product_id == ''){
                    $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                     }
                 var source = $("document-template").html();
                 var source = $("#document-template").html();
                 var tamplate = Handlebars.compile(source);
                 var data = {
                    date:date,
                    purchase_no:purchase_no,
                    supplier_id:supplier_id,
                    category_id:category_id,
                    category_name:category_name,
                    product_id:product_id,
                    product_name:product_name
                 };
                 var html = tamplate(data);
                 $("#addRow").append(html); 
            });

            $(document).on("click", ".removeeventmore", function(event){
                $(this).closest(".delete_add_more_item").remove();
            })

        });
    </script>

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
