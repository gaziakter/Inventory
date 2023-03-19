<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Auth;
use Illuminate\Support\Carbon;

class InvoiceController extends Controller
{
    // Show all invoice
    public function InvoiceAll(){
        $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view("backend.invoice.invoice_all", compact('allData'));
    }

    public function InvoiceAdd(){
        $category = Category::all();
        $invoice_data = Invoice::orderBy('id', 'desc')->first();
        if( $invoice_data == null){
            $firstReg = '0';
            $invoice_no =  $firstReg+1;
        }else{
            $invoice_data = Invoice::orderBy('id', 'desc')->first()->invoice_no;
            $invoice_no =  $invoice_data+1;
        }
        $date = date('Y-m-d');
        return view('backend.invoice.invoice_add', compact('category', 'invoice_no', 'date'));
    }
}
