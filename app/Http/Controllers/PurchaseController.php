<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchaselist = Purchase::all();
        return view('purchase.index',compact('purchaselist'));
    }


    public function create()
    {
        $purchaseitems = PurchaseItem::all();
        $suppliers = Supplier::all();
        return view('purchase.create', compact('purchaseitems','suppliers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'particular'        => 'required',
            'amount'        => 'required',
        ]);
                $purchase = new Purchase();
                $purchase->name   = $request->name;
                $purchase->suppliername   = $request->suppliername;
                $purchase->particular    = $request->particular;
                $purchase->qty    = $request->qty;
                $purchase->amount       = $request->amount;
                $purchase->save();
                return redirect()->back()->with('message', 'New Purchase successfully');

    }

    public function show(string $id)
    {
        $purchseshow = Purchase::findOrFail($id);
        return view('purchase.show', compact('purchseshow'));
    }


    public function edit(string $id)
    {
        $purchaseitemsedit = PurchaseItem::all();
        $purchaseedit = Purchase::findOrFail($id);
        $suppliers = Supplier::all();
        return view('purchase.edit', compact('purchaseedit','purchaseitemsedit','suppliers'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string',
            'particular'        => 'required',
            'amount'        => 'required',
        ]);

        $purchase = Purchase::find($id);

        if (!$purchase) {
            return redirect()->back()->with('error', 'Purchse not found');
        }

        $purchase->name   = $request->name;
        $purchase->particular = $request->particular;
        $purchase->qty    = $request->qty;
        $purchase->amount = $request->amount;
        $purchase->save();

return redirect()->back()->with('message', 'Purchase update successfully');
    }

    public function destroy(string $id)
    {
        $purchasedestroy = Purchase::findOrFail($id);
        $purchasedestroy->delete();

        return redirect()->route('purchase.index')
            ->with('success', 'Purchase deleted successfully');
    }


    public function getitem(){

        return view('purchase.getitem');
    }


    public function storeitem(Request $request){

        $request->validate([
            'name'    => 'required',


        ]);
                $purchaseitem = new PurchaseItem();
                $purchaseitem->name = $request->name;
                $purchaseitem->save();
                return redirect()->back()->with('message', 'New Purchaseitem  successfully');
    }

    public function gettest(){

        return view('purchase.test');
    }


    public function getData()
{


        $response = Http::get('https://jsonplaceholder.typicode.com/posts');


            $data = $response->json();
            // $data = (array)$data;


            return response()->json($data);
            // return view('purchase.test', compact('data'));
    //   print_r($data);

}
// public function fetchDataFromApi()
// {

        // $response = Http::get('https://api.example.com/data');
        // $data = $response->json();

        // return response()->json($data);
        // return view('purchase.test', compact('response'));
        // print_r($data);
        // die;

        // foreach ($data as $post) {
        //    $post = (array)$post;

        //    Post::updateOrCreate(

        //     ['id' => $post['id']],
        //     [
        //         'id'=>$post['id'],
        //         'userId'=>$post['userId'],
        //         'title'=>$post['title'],
        //         'body'=>$post['body'],
        //     ],
        //    );
        // }


// }


}
