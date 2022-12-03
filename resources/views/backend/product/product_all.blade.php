@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        
            <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Customer All</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
        
                        <h4 style="dispay:inline-block; float:left;" class="card-title">Customer All Data</h4>
                        <a style="display: inline-block; float: right;" href="{{route('customer.add')}}" class="btn btn-dark btn-rounded waves-effect wave-light">Add Customer</a>
                        <br>
                        <br>
                        <hr>
        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Product Name</th>
                                <th>Supplier</th>
                                <th>Unit</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
 
                            <tbody>
                                @foreach($product as $key => $item)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->supplier_id}}</td>  
                                <td>{{ $item->unit_id}}</td>  
                                <td>{{ $item->category_id}}</td>  
                                <td><img style="width:50px; height:auto;" src="{{ asset($item->image)}}" alt=""></td>       
                                <td>
                                    <a href="{{route('customer.edit', $item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('customer.delete', $item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        
                        
    </div>
</div>

@endsection