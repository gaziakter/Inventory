@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        
            <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Invoice All</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="dispay:inline-block; float:left;" class="card-title">Invoice All Data</h4>
                        <a style="display: inline-block; float: right;" href="{{route('invoice.add')}}" class="btn btn-dark btn-rounded waves-effect wave-light">Add Invoice</a>
                        <br>
                        <br>
                        <hr>
        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Customer Name</th>
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
 
                            <tbody>
                                @foreach($allData as $key => $item)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $item['payment']['customer']['name'] }} </td> 
                                <td> #{{ $item->invoice_no }} </td> 
                                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 
                                <td> {{ $item->description }} </td> 
                                <td>  $ {{ $item['payment']['total_amount'] }} </td>
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