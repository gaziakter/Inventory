<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    // ProductAll
    public function ProductAll(){
        $product = Product::latest()->get();
        return view('backend.product.product_all', compact('product'));
    } 

}
