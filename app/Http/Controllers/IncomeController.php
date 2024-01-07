<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\IncomeItem;
use App\Models\Invoice;

class IncomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $incomes = Income::all();
        $incomeItems = IncomeItem::all();

        return view('income.index', compact('incomes','incomeItems'));
    }


    public function create()
    {
        $incomeitems = IncomeItem::all();
        return view('income.create',compact('incomeitems'));
    }


    public function store(Request $request)
    {

         $request->validate([

            'name' => 'required',
            'qty' => 'required',
            'amount' => 'required',
        ]);


        $incomes = new Income();
        $incomes->name = $request->name;
        $incomes->particular = $request->particular;
        $incomes->qty = $request->qty;
        $incomes->amount = $request->amount;
        $incomes->save();


        return redirect()->back()->with('message', 'New income has been added successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $incomeitemedit = IncomeItem::all();
        $incomeedit =Income::findOrFail($id);
        return view('income.edit', compact('incomeedit','incomeitemedit'));
    }




public function update(Request $request, $id)
{
    $request->validate([

                'particular' => 'required',
                'qty' => 'required',
                'amount' => 'required',
            ]);

    $incomeupdates = Income::find($id);

    if (!$incomeupdates) {
        return redirect()->back()->with('error', 'Income not found');
    }

    $incomeupdates->name = $request->name;
    $incomeupdates->particular = $request->particular;
    $incomeupdates->qty = $request->qty;
    $incomeupdates->amount = $request->amount;
    $incomeupdates->save();


    return redirect()->back()->with('message', ' Income has been Update successfully');
}

public function destroy($id)
    {
        $incomedel = Income::find($id);
        $incomedel->delete();
        return redirect()->back();

    }


    public function getitem(){

        return view('income.getitem');
    }


    public function storeitem(Request $request){

        $request->validate([
            'name'    => 'required',
        ]);
                $incometem = new IncomeItem();
                $incometem->name = $request->name;
                $incometem->save();
                return redirect()->back()->with('message', 'New Incomeitem  successfully');
    }
}
