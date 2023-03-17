@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        
            <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Purchase Pending</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="dispay:inline-block; float:left;" class="card-title">Purchase Pending</h4>
                        <a style="display: inline-block; float: right;" href="{{route('purchase.add')}}" class="btn btn-dark btn-rounded waves-effect wave-light">Add Purchase</a>
                        <br>
                        <br>
                        <hr>
        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Purchase No</th>
                                <th>Date</th>
                                <th>Supplier</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
 
                            <tbody>
                                @foreach($allData as $key => $item)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $item->purchase_no }} </td> 
                                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 
                                <td> {{ $item['supplier']['name'] }} </td> 
                                <td> {{ $item['category']['name'] }} </td> 
                                <td> {{ $item->buying_qty }} </td> 
                                <td> {{ $item['product']['name'] }} </td> 
                                <td> 
                                @if($item->status == '0')
                                <span class="btn btn-warning">Pending</span>
                                @elseif($item->status == '1')
                                <span class="btn btn-success">Approved</span>   
                                @endif 
                                </td> 
                                <td>
                                    @if($item->status == 0 )
                                    <a href="{{route('purchase.approve', $item->id)}}" class="btn btn-danger sm" title="Approve" id="approvebrn"><i class="fas fa-check-circle"></i></a>
                                    @endif
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