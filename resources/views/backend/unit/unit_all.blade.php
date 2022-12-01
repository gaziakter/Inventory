@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        
            <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Unit All</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
        
                        <h4 style="dispay:inline-block; float:left;" class="card-title">Unit All Data</h4>
                        <a style="display: inline-block; float: right;" href="{{route('unit.add')}}" class="btn btn-dark btn-rounded waves-effect wave-light">Add Unit</a>
                        <br>
                        <br>
                        <hr>
        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Unit Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
        
        
                            <tbody>
                                @foreach($units as $key => $item)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>{{ $item->name}}</td>     
                                <td>
                                    <a href="" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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