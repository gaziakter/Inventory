<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    // SupplierAll
    public function SupplierAll(){
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all', compact('suppliers'));
    } //End SupplierAll method

        // SupplierAdd
        public function SupplierAdd(){
            return view('backend.supplier.supplier_add');
        } //End SupplierAdd method
}
