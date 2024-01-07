<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $suppliers = Supplier::all();

        return view('supplier.index', compact('suppliers'));
    }


    public function create()
    {


        return view('supplier.create');
    }


    public function store(Request $request)
    {

         $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',

        ]);


        $suppliers = new Supplier();
        $suppliers->name = $request->name;
        $suppliers->mobile = $request->mobile;
        $suppliers->address = $request->address;
        $suppliers->details = $request->details;
        $suppliers->save();


        return redirect()->back()->with('message', 'New Supplier has been added successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {


        $supplieredit =Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplieredit'));
    }



    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'mobile' => 'required',
        'address' => 'required',

    ]);

    $suppliersup = Supplier::find($id);

    if (!$suppliersup) {
        return redirect()->back()->with('error', 'Product not found');
    }

    $suppliersup->name = $request->name;
    $suppliersup->mobile = $request->mobile;
    $suppliersup->address = $request->address;
    $suppliersup->details = $request->details;
    $suppliersup->save();


    return redirect()->back()->with('message', 'Supplier has been updated successfully');
}
    public function destroy($id)
    {
        $suppliersdel = Supplier::find($id);
        $suppliersdel->delete();
        return redirect()->back();

    }
}
