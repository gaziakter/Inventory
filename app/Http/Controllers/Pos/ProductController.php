<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Supplier;
use Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    // ProductAll
    public function ProductAll(){
        $product = Product::latest()->get();
        return view('backend.product.product_all', compact('product'));
    } 

    // Product Add
    public function ProductAdd(){
        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('backend.product.product_add', compact('supplier', 'category', 'unit'));
    } 

    // Product Store
    public function productStore(Request $request){
        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }

}
