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
}
