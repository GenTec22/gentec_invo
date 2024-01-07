<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSupplier;
use App\Models\Supplier;
use App\Models\Tax;
use App\Models\Unit;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $product = Product::all();

        return view('product.index', compact('product'));
    }


    public function create()
    {


        return view('product.create');
    }


    public function store(Request $request)
    {

         $request->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',

        ]);


        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->save();


        return redirect()->back()->with('message', 'New product has been added successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {


        $products =Product::findOrFail($id);
        return view('product.edit', compact('products'));
    }



    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'code' => 'required',
        'price' => 'required',

    ]);

    $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found');
    }

    $product->name = $request->name;
    $product->code = $request->code;
    $product->price = $request->price;
    $product->save();


    return redirect()->back()->with('message', 'Product has been updated successfully');
}

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();

    }
}
